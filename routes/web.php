<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PageController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin/user
Route::group(['middleware' => ['auth', 'role:admin|user']], function () {
    Route::get('/profile', [UserProfileController::class, 'edit'])->name('users.profile.edit');
    Route::post('/profile', [UserProfileController::class, 'update'])->name('users.profile.update');
    Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show')->middleware('can:show,department');
});
//Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    // admin dashboard redirection
    Route::get('/', function () {
        return redirect()->route('users.index');
    })->name('admin');
    //home
    Route::group(['prefix' => 'pages'], function () {
    Route::get('/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::post('/{page}', [PageController::class, 'update'])->name('pages.update');
    });
    //user
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('', [UserController::class, 'store'])->name('users.store');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    //department
    Route::group(['prefix' => 'departments'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::post('', [DepartmentController::class, 'store'])->name('departments.store');
        Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    });
});
//Ajax
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::group(['prefix' => 'users'], function () {
        //Ajax user
        Route::get('/{user}/departments', [AjaxUserController::class, 'index'])->name('ajax.departments.index');
        Route::post('/{user}/departments', [AjaxUserController::class, 'store'])->name('ajax.departments.store');
        Route::post('/{user}', [AjaxUserController::class, 'update'])->name('ajax.users.update');
    });
    Route::group(['prefix' => 'departments'], function () {
        //Ajax department
        Route::get('/{department}/users', [AjaxDepartmentController::class, 'index'])->name('ajax.users.index');
        Route::post('/{department}/users', [AjaxDepartmentController::class, 'store'])->name('ajax.users.store');
        Route::put('/{department}', [AjaxDepartmentController::class, 'update'])->name('ajax.departments.update');
    });
});
