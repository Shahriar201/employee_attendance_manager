<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Login with google
Route::get('auth/google', [App\Http\Controllers\GoogleAuthController::class, 'redirectToGoogle'])->name('login.google.auth');
Route::get('auth/google/call-back', [App\Http\Controllers\GoogleAuthController::class, 'callbackGoogle']);

Route::group(['middleware'=>'auth'], function() {

    Route::prefix('manages')->group(function() {
        // Permission routes
        Route::get('/permission-view', [App\Http\Controllers\PermissionController::class, 'viewPermission'])->name('permissions.view');
        Route::get('/permission-add', [App\Http\Controllers\PermissionController::class, 'addPermission'])->name('permissions.add');
        Route::post('/permission-store', [App\Http\Controllers\PermissionController::class, 'storePermission'])->name('permissions.store');
        Route::get('/permission-edit/{id}', [App\Http\Controllers\PermissionController::class, 'editPermission'])->name('permissions.edit');
        Route::post('/permission-update/{id}', [App\Http\Controllers\PermissionController::class, 'updatePermission'])->name('permissions.update');
        Route::post('/permission-delete', [App\Http\Controllers\PermissionController::class, 'deletePermission'])->name('permissions.delete');

        // Role routes
        Route::get('/role-view', [App\Http\Controllers\RoleController::class, 'viewRole'])->name('roles.view');
        Route::get('/role-add', [App\Http\Controllers\RoleController::class, 'addRole'])->name('roles.add');
        Route::post('/role-store', [App\Http\Controllers\RoleController::class, 'storeRole'])->name('roles.store');
        Route::get('/role-edit/{id}', [App\Http\Controllers\RoleController::class, 'editRole'])->name('roles.edit');
        Route::post('/role-update/{id}', [App\Http\Controllers\RoleController::class, 'updateRole'])->name('roles.update');
        Route::post('/role-delete', [App\Http\Controllers\RoleController::class, 'deleteRole'])->name('roles.delete');
    });

    Route::prefix('employees')->group(function(){
        Route::get('/view', [App\Http\Controllers\Backend\EmployeeController::class, 'viewEmployee'])->name('employees.view');
        Route::get('/add', [App\Http\Controllers\Backend\EmployeeController::class, 'addEmployee'])->name('employees.add');
        Route::post('/store', [App\Http\Controllers\Backend\EmployeeController::class, 'storeEmployee'])->name('employees.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'editEmployee'])->name('employees.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'updateEmployee'])->name('employees.update');
        Route::post('/delete', [App\Http\Controllers\Backend\EmployeeController::class, 'deleteEmployee'])->name('employees.delete');

        // Employee details routes
        Route::get('/details-view', [App\Http\Controllers\Backend\EmployeeDetailsController::class, 'viewEmployeeDetails'])->name('employees.details.view');

        // Employee details routes
        Route::get('/contacts-view', [App\Http\Controllers\Backend\EmployeeContactController::class, 'viewEmployeeContacts'])->name('employees.contacts.view');
    });
});

