<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Middleware\AdminAuthenticate;

//  Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.home')->middleware(AdminAuthenticate::class);
//  Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
//  Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
// Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::post('/admin/login', 'AdminController@login');
// Route::post('/admin/logout', 'AdminController@logout');
require __DIR__ . '/frontend.php';
require __DIR__ . '/backend.php';
