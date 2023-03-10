<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('test', function(){
    return 'Hola';
})->middleware('role:paciente');

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

// FRONTOFFICE
Route::group(['as' => 'frontoffice.' ], function(){
    Route::get('profile', [UserController::class,'profile'])->name('user.profile');
    Route::get('profile/{user}/edit', [UserController::class,'edit'])->name('user.edit');
    Route::put('profile/{user}/update', [UserController::class,'update'])->name('user.update');
    Route::get('profile/edit_password', [UserController::class,'edit_password'])->name('user.edit_password');
    Route::put('profile/change_password', [UserController::class,'change_password'])->name('user.change_password');
    Route::get('patient/schedule', [PatientController::class,'schedule'])->name('patient.schedule');
    Route::get('patient/appointments', [PatientController::class,'appointments'])->name('patient.appointments');
    Route::get('patient/prescriptions', [PatientController::class,'prescriptions'])->name('patient.prescriptions');
    Route::get('patient/invoices', [PatientController::class,'invoices'])->name('patient.invoices');
});
