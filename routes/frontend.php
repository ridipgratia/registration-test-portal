<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Controllers\EmployeeController;


Route::get('/employee/login', [EmployeeController::class, 'showLoginForm'])->name('employee.login.submit');
Route::get('/employee/register', [EmployeeController::class, 'showRegistrationForm'])->name('employee.registraion.submit');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.home');

?>

