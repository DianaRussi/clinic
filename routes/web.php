<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

Auth::routes(['verify'=>true]);

// BACKOFFICE
Route::group(['middleware' => ['auth'], 'as' => 'backoffice.' ], function(){
    Route::resource('role',RoleController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');