<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Ajax\UserController as AjaxUserController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/profile/{user}', [UserController::class, 'show'])->name('users.show');
    /*
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/department/{id}', [DepartmentController2::class, 'show']);
    Route::get('/profile/{id}', [UserProfileController::class, 'show']);
    Route::post('/profile/{id}', [UserProfileController::class, 'edit']);
    */
});
//Route::group(['middleware' => ['role:admin']], function () {
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    //user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    //department
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::delete('departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    Route::put('departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
    //Ajax user
    Route::get('/users/{user}/departments', [AjaxUserController::class, 'getDepartmentsFromUser'])->name('users.departments.get');
    Route::post('/users/{user}/departments', [AjaxUserController::class, 'addDepartmentsToUser'])->name('users.departments.set');
    //Ajax department
    /*
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
    */
});
