<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\Ajax\UserController as AjaxUserController;
use App\Http\Controllers\Admin\Ajax\DepartmentController as AjaxDepartmentController;
use App\Http\Controllers\UserProfileController;
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

// Admin/user
Route::group(['middleware' => ['role:admin|user']], function () {
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('users.profile.edit')->middleware('auth');
    Route::put('/profile/{user}', [UserController::class, 'update'])->name('users.profile.update')->middleware('can:update,user');
    Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show')->middleware('can:show,department');
    Route::get('/', function(){
        return view('home');
    })->name('home');
});
//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    //user
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    //department
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::delete('departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    //Ajax user
    Route::get('/users/{user}/departments', [AjaxUserController::class, 'index'])->name('ajax.departments.index');
    Route::post('/users/{user}/departments', [AjaxUserController::class, 'store'])->name('ajax.departments.store');
    Route::post('/users/{user}', [AjaxUserController::class, 'update'])->name('ajax.users.update');
    //Ajax department
    Route::get('/departments/{department}/users', [AjaxDepartmentController::class, 'index'])->name('ajax.users.index');
    Route::post('/departments/{department}/users', [AjaxDepartmentController::class, 'store'])->name('ajax.users.store');
    Route::put('departments/{department}', [AjaxDepartmentController::class, 'update'])->name('ajax.departments.update');
});
