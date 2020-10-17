<?php

use App\Http\Controllers\Admin\ManageDepartmentsController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CreateDepartmentController;
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
    Route::get('/department/{id}', [DepartmentController::class, 'show']);
    Route::get('/profile/{id}', [UserProfileController::class, 'show']);
    Route::post('/profile/{id}', [UserProfileController::class, 'edit']);
});
Route::group(['middleware' => ['role:admin']], function () {
    // Create user
    Route::get('/admin/create/user', [CreateUserController::class, 'create']);
    Route::post('/admin/create/user', [CreateUserController::class, 'store']);
    // Create department
    Route::get('/admin/create/department', [CreateDepartmentController::class, 'create']);
    Route::post('/admin/create/department', [CreateDepartmentController::class, 'store']);
    // Manage users
    Route::get('/admin/manage/users', [ManageUsersController::class, 'show']);
    Route::delete('/admin/manage/users/{id}', [ManageUsersController::class, 'delete']);
    Route::post('/admin/manage/users/{id}', [ManageUsersController::class, 'edit']);
    Route::post('/admin/manage/user/add/departments', [ManageUsersController::class, 'addDepartmentsToUser']);
    Route::get('/admin/manage/user/get/departments', [ManageUsersController::class, 'getDepartmentsFromUser']);
    Route::get('/admin/list/users', [ManageUsersController::class, 'showList']);
    //manage departments
    Route::get('/admin/manage/departments', [ManageDepartmentsController::class, 'show']);
    Route::delete('/admin/manage/departments/{id}', [ManageDepartmentsController::class, 'delete']);
    Route::post('/admin/manage/departments/{id}', [ManageDepartmentsController::class, 'edit']);
    Route::post('/admin/manage/departments/add/users', [ManageDepartmentsController::class, 'addUsersToDepartment']);
    Route::get('/admin/manage/department/get/users', [ManageDepartmentsController::class, 'getUsersFromDepartment']);
});
