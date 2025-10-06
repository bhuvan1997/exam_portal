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
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function change_password()
    {
        return view('admin.change_password');
    }

    public function add_course()
    {
        return view('admin.add_course');
    }

    public function manage_course(Request $request)
    {
        $query = DB::table('tbl_course')
            ->select('year_of_study', 'course_code', 'program', 'id');

        // 🔍 Year filter
        if ($request->filled('year_of_study')) {
            $query->where('year_of_study', 'like', '%' . $request->year_of_study . '%');
        }

        // 🔍 Course Code filter
        if ($request->filled('course_code')) {
            $query->where('course_code', 'like', '%' . $request->course_code . '%');
        }

        // ✅ Pagination
        $course = $query->orderBy('created_at', 'desc')->paginate(10);
        $course->appends($request->all()); // Keep filters on pagination links
        return view('admin.manage_course')->with(compact('course'));
    }

    public function add_cource_process(Request $request)
    {
        $validatedData = $request->validate([
            'year_of_study'  => 'required',
            'course_code' => 'required|string|max:255',
            'course'    => 'required|string|max:255'
        ], [
            'year_of_study.required' => 'Please choose year of study',
            'course_code.required' => 'Please enter course code',
            'course.required' => 'Please enter course'
        ]);

        try {
            $checkExist = DB::table('tbl_course')->where('year_of_study', $validatedData['year_of_study'])->where('course_code', $validatedData['course_code'])->exists();
            // 2️⃣ Insert job into database

            if ($checkExist) {
                // 3️⃣ Redirect with Toastr success message
                return redirect()->route('admin.add_course')->withInput()->with('error_message', 'Course with this year already');
            } else {
                $data = [
                    'year_of_study' => $validatedData['year_of_study'],
                    'course_code' => $validatedData['course_code'],
                    'program' => $validatedData['course'],
                    'status' => 'A',
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                DB::table('tbl_course')->insert($data);
                // 3️⃣ Redirect with Toastr success message
                return redirect()->route('admin.manage_course')->with('success_message', 'Course has been added successfully!');
            }
        } catch (\Exception $e) {
            // 4️⃣ Redirect with Toastr error message
            return redirect()->back()->with('error_message', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function add_course_subject($id)
    {
        $id = Crypt::decrypt($id);
        $course = DB::table('tbl_course')->where('id', $id)->first();
        $subject = DB::table('tbl_subject')->get();
        return view('admin.add_course_subject')->with(compact('subject', 'course', 'id'));
    }

    public function add_course_subject_process(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $subjects = $request->input('subjects', []);

        // Count how many subjects already linked to this course
        $existingCount = DB::table('tbl_course_subject')
            ->where('course_id', $id)
            ->count();

        if ($existingCount + count($subjects) > 6) {
            return redirect()->back()
                ->withInput()
                ->with('error_message', 'You can only add a maximum of 6 subjects to this course.');
        }

        foreach ($subjects as $value) {
            $exists = DB::table('tbl_course_subject')
                ->where('course_id', $id)
                ->where('subject_id', $value)
                ->exists();

            if ($exists) {
                return redirect()->back()
                    ->withInput()
                    ->with('error_message', 'This subject is already assigned to the course.');
            }

            if (!$exists) {
                DB::table('tbl_course_subject')->insert([
                    'course_id'  => $id,
                    'subject_id' => $value,
                    'status'     => 'A',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return redirect()->route('admin.manage_course')
            ->with('success_message', 'Subjects have been added to the course');
    }

    public function manage_exam_form(Request $request)
    {
        $query = DB::table('tbl_exam as e')
            ->leftJoin('tbl_course as c', 'c.id', '=', 'e.course_id')
            ->leftJoin('tbl_session as s', 's.id', '=', 'e.session_id')
            ->leftJoin('tbl_exam_type as et', 'et.id', '=', 'e.exam_type')
            ->select('e.*', 'c.year_of_study', 'c.course_code', 'c.program', 's.name', 'et.type');

        // title filter
        if ($request->filled('title')) {
            $query->where('e.title', 'like', '%' . $request->title . '%');
        }

        // course filter
        if ($request->filled('course')) {
            $query->where('e.course_id', $request->course);
        }

        // session filter
        if ($request->filled('session_id')) {
            $query->where('e.session_id', $request->session_id);
        }

        // status filter
        if ($request->filled('status')) {
            $query->where('e.status', $request->status);
        }

        // ✅ Pagination
        $examForm = $query->orderBy('e.created_at', 'desc')->paginate(10);
        $examForm->appends($request->all()); // Keep filters on pagination links
        $course = DB::table('tbl_course')->get();
        $session = DB::table('tbl_session')->get();
        return view('admin.manage_exam_form')->with(compact('examForm', 'course', 'session'));
    }

    public function add_exam_form(Request $request)
    {
        $course = DB::table('tbl_course')->get();
        $session = DB::table('tbl_session')->get();
        $exam_type = DB::table('tbl_exam_type')->get();
        return view('admin.add_exam_form')->with(compact('course', 'session', 'exam_type'));
    }

    public function add_exam_form_process(Request $request)
    {
        $validatedData = $request->validate([
            'title'           => 'required|string|max:255',
            'course'          => 'required',
            'session'         => 'required',
            'exam_type'       => 'required',
            'form_start_date' => 'required|date',
            'form_end_date'   => 'required|date|after_or_equal:form_start_date',
            'exam_fee'        => 'required|numeric|min:0',
            'status'          => 'required|in:draft,published,closed' // example Active/Inactive
        ], [
            'title.required'        => 'Please enter title',
            'course.required'        => 'Please select course',
            'session.required'        => 'Please select session',
            'exam_type.required'        => 'Please select exam type',
            'form_end_date.after_or_equal' => 'Form end date must be after or same as start date',
            'exam_fee.required'        => 'Fee is required'
        ]);


        try {
            $checkExist = DB::table('tbl_exam')->where('course_id', $validatedData['course'])->where('session_id', $validatedData['session'])->where('exam_type', $validatedData['exam_type'])->exists();
            // 2️⃣ Insert job into database

            if ($checkExist) {
                // 3️⃣ Redirect with Toastr success message
                return redirect()->route('admin.add_exam_form')->withInput()->with('error_message', 'Course with this session already added');
            } else {
                $data = [
                    'title' => $validatedData['title'],
                    'course_id' => $validatedData['course'],
                    'session_id' => $validatedData['session'],
                    'exam_type' => $validatedData['exam_type'],
                    'form_start_at' => $validatedData['form_start_date'],
                    'form_end_at' => $validatedData['form_end_date'],
                    'exam_fee' => $validatedData['exam_fee'],
                    'status' => $validatedData['status'],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                DB::table('tbl_exam')->insert($data);
                // 3️⃣ Redirect with Toastr success message
                return redirect()->route('admin.manage_exam_form')->with('success_message', 'Exam form has been added for the course');
            }
        } catch (\Exception $e) {
            // 4️⃣ Redirect with Toastr error message
            return redirect()->back()->with('error_message', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function manage_exam_form_submission(Request $request)
    {
        $query = DB::table('tbl_appln_form as af')
            ->leftJoin('tbl_exam as e', 'e.id', '=', 'af.exam_id')
            ->leftJoin('tbl_course as c', 'c.id', '=', 'e.course_id')
            ->leftJoin('tbl_session as s', 's.id', '=', 'e.session_id')
            ->leftJoin('tbl_exam_type as et', 'et.id', '=', 'e.exam_type')
            ->select('af.*', 'e.title', 'e.exam_fee', 'c.year_of_study', 'c.course_code', 'c.program', 's.name', 'et.id as exam_type')
            ->get();
        return view('admin.manage_exam_form_submission')->with(compact('query'));
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
            ->where('p.appln_id', $id)
            ->select('p.created_at', 'p.order_id', 'p.payment_id', 'p.amount', 'p.status as paymentStatus', 'af.*', 'e.title', 'e.exam_fee', 'c.year_of_study', 'c.course_code', 'c.program', 's.name', 'et.type','e.form_start_at','e.form_end_at','e.course_id')
            ->first();

        $profiledata = DB::table('tbl_user_profile')->where('user_id', $query->user_id)->first();

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

        // $pdf = Pdf::loadView('user.receipt.exam-form-receipt', $data)
        //     ->setPaper('A4', 'portrait');

        return view('user.receipt.exam-form-receipt', $data);

    }

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
