<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Facades\Captcha;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{

    // public function __construct()
    // {
    //     // No middleware() → do plain check here
    //     $currentRoute = Route::currentRouteName();

    //     if ($currentRoute !== 'user.update_profile') {
    //         if (is_null(Auth::user()->is_profile_updated)) {
    //             redirect()->route('user.update_profile', Crypt::encrypt(Auth::id()))->send();
    //             exit; // stop execution after redirect
    //         }
    //     }
    // }
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function profile()
    {
        $profile = DB::table('tbl_user_profile')->where('user_id', Auth::user()->id)->first();
        return view('user.profile')->with(compact('profile'));
    }

    public function change_password()
    {
        return view('user.change_password');
    }

    public function update_profile($id)
    {
        $id = Crypt::decrypt($id);
        $profile = DB::table('tbl_user_profile as up')
            ->Join('users as u', 'u.id', '=', 'up.user_id')
            ->select('up.*', 'u.name as username', 'u.email as useremail', 'u.mobile as usermobile', 'u.id as userid')
            ->where('up.user_id', $id)
            ->first();
        return view('user.updateprofile')->with(compact('profile'));
    }

    public function update_profile_process(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        // dd($id);
        try {
            // Validation
            $validated = $request->validate([
                'user_photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'name'            => 'required|string|max:255',
                'email'           => 'required|email',
                'mobile'          => 'required|digits:10',
                'dob'             => 'nullable|date',
                'address'         => 'nullable|string|max:500',
                'city'            => 'nullable|string|max:100',
                'state'           => 'nullable|string|max:100',
                'pincode'         => 'nullable|digits:6',
                'gender'          => 'nullable',
                'marital_status'  => 'nullable',
                'category'  => 'nullable',
            ]);

            // Get candidate profile for logged-in user
            $user = DB::table('tbl_user_profile')->where('user_id', Auth::id())->firstOrFail();

            // Handle profile image upload
            if ($request->hasFile('user_photo')) {
                // Delete old image if exists
                // if ($user->user_photo && file_exists(public_path('uploads/user/photo/' . $user->user_photo))) {
                //     unlink(public_path('uploads/user/photo/' . $user->user_photo));
                // }

                // Generate unique name
                $imageName = time() . '_' . uniqid() . '.' . $request->user_photo->extension();

                // Move file to public/profile/candidate
                $request->user_photo->move(public_path('uploads/users/photo/'), $imageName);

                // Save in DB
                $validated['user_photo'] = $imageName;
            }

            // Handle profile image upload
            if ($request->hasFile('user_sign')) {
                // Delete old image if exists
                // if ($user->user_sign && file_exists(public_path('uploads/user/sign/' . $user->user_sign))) {
                //     unlink(public_path('uploads/user/sign/' . $user->user_sign));
                // }

                // Generate unique name
                $imageName = time() . '_' . uniqid() . '.' . $request->user_sign->extension();

                // Move file to public/profile/candidate
                $request->user_sign->move(public_path('uploads/users/sign/'), $imageName);

                // Save in DB
                $validated['user_sign'] = $imageName;
            }

            // dd($validated);

            // Update profile
            DB::table('tbl_user_profile')->where('user_id',$id)->update($validated);

            if(count($validated) <= 14)
            {
                DB::table('users')->where('id',$id)->update(['is_profile_updated' => now()]);
            }

            return back()->with('success_message', 'Profile updated successfully!');
        } catch (Exception $e) {
            // Log error for debugging
            Log::error('Profile update failed: ' . $e->getMessage());

            return back()->with('error_message', $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'
            ],
        ], [
            'new_password.regex' => 'Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error_message', 'Current password is incorrect!');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success_message', 'Password updated successfully!');
    }

    public function fetch_exam_form()
    {
        $query = DB::table('tbl_exam as e')
            ->leftJoin('tbl_course as c', 'c.id', '=', 'e.course_id')
            ->leftJoin('tbl_session as s', 's.id', '=', 'e.session_id')
            ->leftJoin('tbl_exam_type as et', 'et.id', '=', 'e.exam_type')
            ->select('e.*', 'c.year_of_study', 'c.course_code', 'c.program', 's.name', 'et.type');
        $forms = $query->orderBy('e.created_at', 'desc')->paginate(10);
        return view('user.get_all_form')->with(compact('forms'));
    }

    public function fill_exam_form($id)
    {
        $id = Crypt::decrypt($id);
        $form = DB::table('tbl_exam as e')
            ->leftJoin('tbl_course as c', 'c.id', '=', 'e.course_id')
            ->leftJoin('tbl_session as s', 's.id', '=', 'e.session_id')
            ->leftJoin('tbl_exam_type as et', 'et.id', '=', 'e.exam_type')
            ->where('e.id', $id)
            ->select('e.*', 'c.year_of_study', 'c.course_code', 'c.program', 's.name', 'et.type')
            ->first();
        $profile = DB::table('tbl_user_profile')->where('user_id', Auth::user()->id)->first();
        return view('user.fill_exam_form')->with(compact('form', 'id', 'profile'));
    }

    public function checkRoll(Request $request)
    {
        $roll = $request->input('roll_no');
        $valueId = $request->input('valueId');

        $form = DB::table('tbl_exam as e')
            ->leftJoin('tbl_course as c', 'c.id', '=', 'e.course_id')
            ->leftJoin('tbl_session as s', 's.id', '=', 'e.session_id')
            ->leftJoin('tbl_exam_type as et', 'et.id', '=', 'e.exam_type')
            ->where('e.id', $valueId)
            ->select('e.*', 'c.year_of_study', 'c.course_code', 'c.program', 's.name', 'et.type')
            ->first();

        // Example table: students (id, roll_no, name, course, etc.)
        $student = DB::table('tbl_student_exam_allowed')->where('roll_no', $roll)->where('course', 'like', '%' . $form->course_code . '%')->where('exam_type', 'like', '%' . $form->type . '%')->where('session', $form->name)->first();

        if ($student) {
            // Pass student data to the same view
            return view('user.fill_exam_form', compact('student', 'form'));
        } else {
            // If not found, redirect back with an error
            return redirect()->back()->with('error_message', 'You are not allowed to fill the form. Invalid Roll Number.');
        }
    }

    public function submitForm(Request $request)
    {
        // Process and save the form data
        DB::table('exam_forms')->insert([
            'roll_no' => $request->input('roll_no'),
            'course' => $request->input('course'),
            'session' => $request->input('session'),
            'exam_fee' => $request->input('exam_fee'),
            'created_at' => now(),
        ]);

        return redirect()->route('user.fetch_exam_form')->with('success_message', 'Form submitted successfully!');
    }

    public function submit_exam_form(Request $request, $id)
    {
        $id = Crypt::decrypt($id);

        try {
            $validatedData = $request->validate([
                'full_name'   => 'required|string|max:100',
                'father_name' => 'required|string|max:100',
                'roll_no'     => 'required',
                'college'     => 'required',
                'university'  => 'required'
            ], [
                'full_name.required'   => 'Please enter full name',
                'father_name.required' => 'Please enter father name',
                'roll_no.required'     => 'Please enter roll number',
                'college.required'     => 'Please enter college name',
                'university.required'  => 'Please enter university name'
            ]);

            $data = [
                'appln_no'       => date('YmdHis'),
                'exam_id'        => $id,
                'user_id'        => Auth::user()->id,
                'full_name'      => $validatedData['full_name'],
                'father_name'    => $validatedData['father_name'],
                'roll_no'        => $validatedData['roll_no'],
                'college'        => $validatedData['college'],
                'university'     => $validatedData['university'],
                'status'         => 'pending',
                'payment_status' => 'P',
                'created_at'     => now(),
                'updated_at'     => now()
            ];

            DB::table('tbl_appln_form')->insert($data);

            return redirect()
                ->route('user.exam_form_payment')
                ->with('success_message', 'Exam form has been submitted, Please make payment for the confirmation.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Redirect back with validation errors and input
            return redirect()
                ->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error_message', 'Something went wrong: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function exam_form_payment(Request $request)
    {
        $query = DB::table('tbl_appln_form as af')
            ->leftJoin('tbl_exam as e', 'e.id', '=', 'af.exam_id')
            ->leftJoin('tbl_course as c', 'c.id', '=', 'e.course_id')
            ->leftJoin('tbl_session as s', 's.id', '=', 'e.session_id')
            ->leftJoin('tbl_exam_type as et', 'et.id', '=', 'e.exam_type')
            ->where('af.user_id', Auth::user()->id)
            ->select('af.*', 'e.title', 'e.exam_fee', 'c.year_of_study', 'c.course_code', 'c.program', 's.name', 'et.id as exam_type');

        if ($request->filled('appln_no')) {
            $query->where('af.appln_no', $request->appln_no);
        }

        $applnForm = $query->orderBy('af.created_at', 'desc')->paginate(10);
        $applnForm->appends($request->all()); // Keep filters on pagination links
        return view('user.exam_form_payment')->with(compact('applnForm'));
    }

    public function payment_receipt($id)
    {
        $id = Crypt::decrypt($id);
        $query = DB::table('tbl_payments as p')
            ->leftJoin('tbl_appln_form as af', 'af.id', '=', 'p.appln_id')
            ->leftJoin('tbl_exam as e', 'e.id', '=', 'af.exam_id')
            ->leftJoin('tbl_course as c', 'c.id', '=', 'e.course_id')
            ->leftJoin('tbl_session as s', 's.id', '=', 'e.session_id')
            ->leftJoin('tbl_exam_type as et', 'et.id', '=', 'e.exam_type')
            ->where('af.user_id', Auth::user()->id)
            ->where('p.appln_id', $id)
            ->select('p.created_at', 'p.order_id', 'p.payment_id', 'p.amount', 'p.status as paymentStatus', 'af.*', 'e.title')
            ->first();

        $data = [
            'receipt_no' => 'EXM-' . $query->appln_no . '_' . date('His'),
            'name'       => auth()->user()->name ?? 'John Doe',
            'amount'     => $query->amount / 100,
            'exam_name'  => $query->title,
            'date'       => date('d-m-Y H:i:s', strtotime($query->created_at)),
            'order_id'  => $query->order_id,
            'payment_id'  => $query->payment_id,
            'paymentStatus'  => $query->paymentStatus
        ];

        // Load the Blade view and pass data
        $pdf = Pdf::loadView('user.receipt.payment-receipt', $data);

        // File name and path
        $fileName = 'payment_receipt_' . $data['receipt_no'] . '.pdf';
        $path = public_path('uploads/payment_receipts/');

        // Create directory if not exists
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        // Save the PDF to the uploads folder
        $pdf->save($path . $fileName);

        // Return the PDF for download
        return response()->download($path . $fileName);
    }

    public function exam_form_receipt($id)
    {

        $id = Crypt::decrypt($id);
        $query = DB::table('tbl_payments as p')
            ->leftJoin('tbl_appln_form as af', 'af.id', '=', 'p.appln_id')
            ->leftJoin('tbl_exam as e', 'e.id', '=', 'af.exam_id')
            ->leftJoin('tbl_course as c', 'c.id', '=', 'e.course_id')
            ->leftJoin('tbl_session as s', 's.id', '=', 'e.session_id')
            ->leftJoin('tbl_exam_type as et', 'et.id', '=', 'e.exam_type')
            ->where('af.user_id', Auth::user()->id)
            ->where('p.appln_id', $id)
            ->select('p.created_at', 'p.order_id', 'p.payment_id', 'p.amount', 'p.status as paymentStatus', 'af.*', 'e.title', 'e.exam_fee', 'c.year_of_study', 'c.course_code', 'c.program', 's.name', 'et.type','e.form_start_at','e.form_end_at','e.course_id')
            ->first();

        $profiledata = DB::table('tbl_user_profile')->where('user_id', Auth::user()->id)->first();

        $student = [
            'name'        => ucwords($query->full_name),
            'father_name' => ucwords($query->father_name),
            'roll_no'     => ucwords($query->roll_no),
            'dob'         => date('d-m-Y', strtotime($profiledata->dob)),
            'category'    => ucwords($profiledata->category),
            'college'     => ucwords($query->college),
            'university'  => ucwords($query->university),
            'mobile'      => Auth::user()->mobile,
            'email'       => Auth::user()->email,
            // Place your files in public/uploads/photos & public/uploads/signs
            'photo_path'  => public_path('uploads/users/photo/'.$profiledata->user_photo),
            'sign_path'   => public_path('uploads/users/sign/'.$profiledata->user_sign),
        ];

        $exam = [
            'title'       => ucwords($query->title),
            'session'     => $query->name,
            'exam_type'   => ucwords($query->type),
            'appln_no'    => $query->appln_no,
            'form_start'  => date('d-m-Y', strtotime($query->form_start_at)),
            'form_end'    => date('d-m-Y', strtotime($query->form_end_at)),
            'exam_fee'    => $query->exam_fee,
            'paid_on'     => date('d-m-Y H:i:s', strtotime($query->created_at)),
            'payment_id'      => $query->payment_id,
            'order_id'      => $query->order_id,
            'status'      => $query->paymentStatus,
        ];

        $subjects = DB::table('tbl_course_subject as cs')->leftJoin('tbl_course as c','c.id','=','cs.course_id')->leftJoin('tbl_subject as s','s.id','=','cs.subject_id')->where('cs.course_id',$query->course_id)->get();

        $amount_total = $exam['exam_fee'];

        // Convert images to base64 so DomPDF always renders them reliably
        $photoBase64 = $this->imageToBase64($student['photo_path']); // returns null if missing
        $signBase64  = $this->imageToBase64($student['sign_path']);

        $data = compact('student', 'exam', 'subjects', 'amount_total', 'photoBase64', 'signBase64');

        $pdf = Pdf::loadView('user.receipt.exam-form-receipt', $data)
            ->setPaper('A4', 'portrait');

        // return view('user.receipt.exam-form-receipt', $data);

        // Save & download
        $fileName = 'exam_payment_receipt_' . $exam['appln_no'] . '.pdf';
        $dir = public_path('uploads/exam_form_receipts/');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0777, true, true);
        }
        $fullPath = $dir . $fileName;
        $pdf->save($fullPath);

        return response()->download($fullPath);
    }

    /**
     * Safely convert an image file to base64 <img src="data:..."> usable in DomPDF
     */
    private function imageToBase64(?string $absolutePath): ?string
    {
        try {
            if (!$absolutePath || !file_exists($absolutePath)) return null;
            $type = pathinfo($absolutePath, PATHINFO_EXTENSION);
            $data = file_get_contents($absolutePath);
            return 'data:image/' . $type . ';base64,' . base64_encode($data);
        } catch (\Throwable $e) {
            return null;
        }
    }
}
