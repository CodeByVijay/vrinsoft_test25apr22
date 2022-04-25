<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    return view('index');
});
Route::get('/login', function () {
    return view('sign_in');
});
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard',[AuthController::class,'dashboard']);
Route::get('/logout',[AuthController::class,'signOut']);

Route::get('/admin', function () {
    return view('admin_sign_in');
});
Route::post('admin-login', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
Route::get('user-delete/{id}',[AdminController::class,'userDelete'])->name('user.delete');
Route::get('/admin-logout',[AdminController::class,'signOut']);