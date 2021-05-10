<?php

use App\Http\Controllers\FbController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage')->middleware('reverse_auth');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/email', [UserController::class, 'registerEmailPage'])->name('emailPage')->middleware('reverse_auth');
Route::post('/email', [UserController::class, 'registerEmail'])->name('email');
Route::get('/register/{email}/{mail}', [UserController::class, 'registerPage'])->name('registerPage')->middleware('verify_email');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/auth/facebook', [FbController::class, 'redirectFacebook'])->name('fblogin');
Route::get('/facebook/callback', [FbController::class, 'loginFacebook'])->name('fb');
Route::get('/success', [UserController::class, 'successPage']);

Route::get('/reset-password/{mail}', [UserController::class, 'resetPasswordPage'])->middleware('pwd_link_checker')->name('resetPasswordPage');
Route::post('/reset-password/', [UserController::class, 'resetPassword'])->name('resetPassword');

Route::get('/reset-email-request', [UserController::class, 'resetPasswordEmailPage'])->name('resetPasswordEmailPage');
Route::post('/reset-email-request', [UserController::class, 'sendResetPasswordEmail'])->name('resetPasswordEmail');

Route::middleware(["verify_email"])->group(function() {

});

Route::middleware(['auth'])->group(function() {
    Route::get('/info', [UserController::class, 'info'])->name('info');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

