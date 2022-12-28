<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

Auth::routes(['verify'=>true]);

// BACKOFFICE
Route::group(['middleware' => ['auth'], 'as' => 'backoffice.' ], function(){
    Route::resource('role',RoleController::class);
    Route::resource('permission',PermissionController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');