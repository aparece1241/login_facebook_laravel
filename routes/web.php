<?php

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

Route::get('/login', [UserController::class, 'loginPage'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/email', [UserController::class, 'registerEmailPage'])->name('emailPage');
Route::post('/email', [UserController::class, 'registerEmail'])->name('email');
Route::get('/register/{email}/{mail}', [UserController::class, 'registerPage'])->name('registerPage')->middleware('verify_email');
Route::post('/register', [UserController::class, 'register'])->name('register');
