<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CreateDepartmentController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\Admin\CreateUserController;

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

Route::get('/admin/create/user', [CreateUserController::class, 'create']);
Route::post('/admin/create/user', [CreateUserController::class, 'store']);

Route::get('/admin/create/department', [CreateDepartmentController::class, 'create']);
Route::post('/admin/create/department', [CreateDepartmentController::class, 'store']);

Route::get('/employees', [EmployeesController::class, 'show' ]);

Route::get('/departments', [DepartmentsController::class, 'show' ]);
