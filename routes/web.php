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

Route::get('/login', [UserController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/email', [UserController::class, 'registerEmailPage'])->name('emailPage');
Route::post('/email', [UserController::class, 'registerEmail'])->name('email');
Route::get('/register/{email}/{mail}', [UserController::class, 'registerPage'])->name('registerPage')->middleware('verify_email');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('auth/facebook', [FbController::class, 'redirectFacebook'])->name('fblogin');
Route::get('facebook/callback', [FbController::class, 'loginFacebook'])->name('fb');
Route::get('/success', [UserController::class, 'successPage']);
