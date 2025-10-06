<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;

use Illuminate\Support\Facades\Artisan;

Route::get('/run-optimize', function () {
    Artisan::call('optimize');
    return "Application optimized!";
});

// Home Page
Route::get('/', [LandingController::class, 'home'])->name('home');

// Auth Views
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::get('captcha-image', [AuthController::class, 'captchaimage']);


// Auth Actions
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::match(['get', 'post'], 'logout', [AuthController::class, 'logout'])->name('logout');

// User Dashboard (Role = 1)
Route::middleware(['auth', 'role:1'])->prefix('user')->controller(UserController::class)->name('user.')->group(function () {
    Route::get('/Dashboard', 'dashboard')->name('dashboard');
    Route::get('/Profile', 'profile')->name('profile');
    Route::get('/Update-Profile/{id}', 'update_profile')->name('update_profile');
    Route::post('/Update-Profile/{id}', 'update_profile_process')->name('update_profile_process');
    Route::get('/ChangePassword', 'change_password')->name('change_password');
    Route::post('/update-password', 'updatePassword')->name('updatePassword');

    Route::get('/fill-exam-form', 'fetch_exam_form')->name('fetch_exam_form');
    Route::get('/fill-form/{id}', 'fill_exam_form')->name('fill_exam_form');

    Route::post('/check-roll', 'checkRoll')->name('check_roll');
    Route::post('/submit-form', 'submitForm')->name('submit_form');

    Route::post('/submit-exam-form/{id}', 'submit_exam_form')->name('submit_exam_form');

    Route::get('/exam-form-payment', 'exam_form_payment')->name('exam_form_payment');

    Route::get('/exam/{applnId}/create-order', [PaymentController::class, 'createOrder'])->name('payment.createOrder');
    Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

    Route::get('/payment-receipt/{id}', 'payment_receipt')->name('payment_receipt');

    Route::get('/exam-form-receipt/{id}', 'exam_form_receipt')->name('exam_form_receipt');
});

// Admin Dashboard (Role = 2)
Route::middleware(['auth', 'role:2'])->prefix('admin')->controller(AdminController::class)->name('admin.')->group(function () {
    Route::get('/Dashboard', 'dashboard')->name('dashboard');
    Route::get('/ChangePassword', 'change_password')->name('change_password');
    Route::get('/add-course', 'add_course')->name('add_course');
    Route::post('/add-course', 'add_cource_process')->name('add_cource_process');
    Route::get('/manage-course', 'manage_course')->name('manage_course');
    Route::get('/add-course-subject/{id}', 'add_course_subject')->name('add_course_subject');
    Route::post('/add-course-subject/{id}', 'add_course_subject_process')->name('add_course_subject_process');
    Route::get('/manage-exam-form', 'manage_exam_form')->name('manage_exam_form');
    Route::get('/add-exam-form', 'add_exam_form')->name('add_exam_form');
    Route::post('/add-exam-form', 'add_exam_form_process')->name('add_exam_form_process');
    Route::get('/manage-exam-form-submission', 'manage_exam_form_submission')->name('manage_exam_form_submission');
    Route::get('/exam-form-receipt/{id}', 'exam_form_receipt')->name('exam_form_receipt');
    // Route::get('/manage-exam-form', 'manage_exam_form')->name('manage_exam_form');
});
