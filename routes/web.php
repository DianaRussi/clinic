<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function(){
    return view('welcome');
});
Route::get('home', function(){
    return view('home');
})->middleware('auth');

Auth::routes(['verify'=>true]);

// BACKOFFICE
Route::group(['middleware' => ['auth'], 'as' => 'backoffice.' ], function(){
    Route::get('admin', [AdminController::class, 'show'])->name('admin.show');
    Route::get('user/import', [UserController::class, 'import'])->name('user.import');
    Route::post('user/make_import', [UserController::class, 'make_import'])->name('user.make_import');
    Route::resource('user',UserController::class); 
    Route::get('user/{user}/assign_role', [UserController::class, 'assign_role'] )->name('user.assign_role');
    Route::post('user/{user}/role_assignment',[UserController::class,'role_assignment'])->name('user.role_assignment');
    Route::resource('role',RoleController::class);
    Route::resource('permission',PermissionController::class);
    Route::get('user/{user}/assign_permission', [UserController::class, 'assign_permission'] )->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment',[UserController::class,'permission_assignment'])->name('user.permission_assignment');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');