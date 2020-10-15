<?php

use App\Http\Controllers\Admin\ManageDepartmentsController;
use App\Http\Controllers\Admin\ManageUsersController;
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
Route::group(['middleware' => ['role:admin|user']], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/employees', [EmployeesController::class, 'show']);
    Route::get('/departments', [DepartmentsController::class, 'show']);
});
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/create/user', [CreateUserController::class, 'create']);
    Route::post('/admin/create/user', [CreateUserController::class, 'store']);
    Route::get('/admin/create/department', [CreateDepartmentController::class, 'create']);
    Route::post('/admin/create/department', [CreateDepartmentController::class, 'store']);
    Route::get('/admin/manage/users', [ManageUsersController::class, 'show']);
    Route::delete('/admin/manage/users', [ManageUsersController::class, 'delete']);
    Route::post('/admin/manage/users', [ManageUsersController::class, 'update']);
    Route::get('/admin/manage/departments', [ManageDepartmentsController::class, 'show']);
    Route::delete('/admin/manage/departments', [ManageDepartmentsController::class, 'delete']);
    Route::post('/admin/manage/departments', [ManageDepartmentsController::class, 'update']);
});
