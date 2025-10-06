<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mews\Captcha\Facades\Captcha;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        //  dd(Hash::make('12345678'));
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // Candidate register
    }

    public function login(Request $request)
    {
        // dd('hii');
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check CAPTCHA manually
        if (strtoupper($request->captcha) !== session('captcha_text')) {
            return back()->withErrors(['captcha' => 'Incorrect CAPTCHA'])->withInput();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role == 1) {
                return redirect()->route('user.dashboard')->with('success_message', 'Welcome to the dashboard.');
            } elseif ($user->role == 2) {
                return redirect()->route('admin.dashboard')->with('success_message', 'Welcome to the dashboard.');
            } else {
                Auth::logout();
                return back()->withErrors(['role' => 'Invalid user role.']);
            }
        }

        return back()->withErrors(['email' => 'Invalid email or password.']);
    }

    public function register(Request $request)
    {
        // dd($request->mobile);
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'mobile'   => 'required|digits:10|unique:users,mobile',
            'password' => 'required|string|min:6|confirmed',
            'captcha'  => 'required|string',
        ]);

        // Check CAPTCHA manually
        if (strtoupper($request->captcha) !== session('captcha_text')) {
            return back()->withErrors(['captcha' => 'Incorrect CAPTCHA'])->withInput();
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'mobile'   => $request->mobile,
            'password' => Hash::make($request->password),
            'role'     => 1, // Candidate role
        ]);

        DB::table('tbl_user_profile')->insert(['user_id' => $user->id,'name' => $user->name,'email' => $user->email,'mobile' => $user->mobile]);

        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success_message', 'Please Update your profile first access more features.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }

    public function captchaimage()
    {
        // Generate a new random captcha text every time image is requested
        $text = strtoupper(Str::random(6));
        session(['captcha_text' => $text]); // Update session

        $image = imagecreate(120, 40);
        $bg = imagecolorallocate($image, 211, 211, 211); // White
        $textColor = imagecolorallocate($image, 0, 0, 0); // Black
        imagestring($image, 5, 10, 10, $text, $textColor);

        ob_start();
        imagepng($image);
        $imgData = ob_get_clean();

        imagedestroy($image);

        return response($imgData)->header('Content-Type', 'image/png');
    }
}
