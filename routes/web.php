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
        Route::get('/permission-view', [App\Http\Controllers\PermissionController::class, 'viewPermission'])->name('permissions.view')->middleware(['permission:view permission']);
        Route::get('/permission-add', [App\Http\Controllers\PermissionController::class, 'addPermission'])->name('permissions.add')->middleware(['permission:add permission|view permission']);
        Route::post('/permission-store', [App\Http\Controllers\PermissionController::class, 'storePermission'])->name('permissions.store')->middleware(['permission:add permission|view permission']);
        Route::get('/permission-edit/{id}', [App\Http\Controllers\PermissionController::class, 'editPermission'])->name('permissions.edit')->middleware(['permission:add permission|view permission']);
        Route::post('/permission-update/{id}', [App\Http\Controllers\PermissionController::class, 'updatePermission'])->name('permissions.update')->middleware(['permission:add permission|view permission']);
        Route::post('/permission-delete', [App\Http\Controllers\PermissionController::class, 'deletePermission'])->name('permissions.delete')->middleware(['permission:delete permission|view permission']);

        // Role routes
        Route::get('/role-view', [App\Http\Controllers\RoleController::class, 'viewRole'])->name('roles.view')->middleware(['permission:view role|view permission']);
        Route::get('/role-add', [App\Http\Controllers\RoleController::class, 'addRole'])->name('roles.add')->middleware(['permission:add role|add permission']);
        Route::post('/role-store', [App\Http\Controllers\RoleController::class, 'storeRole'])->name('roles.store')->middleware(['permission:add role|add permission']);
        Route::get('/role-edit/{id}', [App\Http\Controllers\RoleController::class, 'editRole'])->name('roles.edit')->middleware(['permission:add role|add permission']);
        Route::post('/role-update/{id}', [App\Http\Controllers\RoleController::class, 'updateRole'])->name('roles.update')->middleware(['permission:add role|add permission']);
        Route::post('/role-delete', [App\Http\Controllers\RoleController::class, 'deleteRole'])->name('roles.delete')->middleware(['permission:delete role|delete permission']);
    });

    Route::prefix('employees')->group(function() {
        Route::get('/view', [App\Http\Controllers\Backend\EmployeeController::class, 'viewEmployee'])->name('employees.view')->middleware(['permission:view role|view employee']);
        Route::get('/add', [App\Http\Controllers\Backend\EmployeeController::class, 'addEmployee'])->name('employees.add')->middleware(['permission:add role|add employee']);
        Route::post('/store', [App\Http\Controllers\Backend\EmployeeController::class, 'storeEmployee'])->name('employees.store')->middleware(['permission:add role|add employee']);
        Route::get('/edit/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'editEmployee'])->name('employees.edit')->middleware(['permission:add role|add employee']);
        Route::post('/update/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'updateEmployee'])->name('employees.update')->middleware(['permission:add role|add employee']);
        Route::post('/delete', [App\Http\Controllers\Backend\EmployeeController::class, 'deleteEmployee'])->name('employees.delete')->middleware(['permission:delete role|delete employee']);

        // Employee details routes
        Route::get('/details-view', [App\Http\Controllers\Backend\EmployeeDetailsController::class, 'viewEmployeeDetails'])->name('employees.details.view');

        // Employee details routes
        Route::get('/contacts-view', [App\Http\Controllers\Backend\EmployeeContactController::class, 'viewEmployeeContacts'])->name('employees.contacts.view');

        // All attendance routes
        Route::get('/all-attendance-list', [App\Http\Controllers\Backend\EmployeeAttendanceController::class, 'allEmployeeAttendanceList'])->name('all.employees.attendance.list');
        Route::get('/attendance-details/{date}', [App\Http\Controllers\Backend\EmployeeAttendanceController::class, 'employeeAttendanceDetails'])->name('all.employees.attendance.details');

        // Employee Report routes for admin
        Route::get('/all-employees-report', [App\Http\Controllers\Backend\EmployeeAttendanceController::class, 'allEmployeeAttendanceReport'])->name('all.employees.attendance.report');

        // Employee attendance routes
        Route::get('/attendance', [App\Http\Controllers\Backend\EmployeeAttendanceController::class, 'employeeAttendanceAdd'])->name('employees.attendance.add');
        Route::post('/attendance-store', [App\Http\Controllers\Backend\EmployeeAttendanceController::class, 'employeeAttendanceStore'])->name('employees.attendance.store');
        Route::get('/attendance-list', [App\Http\Controllers\Backend\EmployeeAttendanceController::class, 'employeeAttendanceList'])->name('employees.attendance.list');

        // Employee attendance reports for login user
        Route::get('/attendance-reports', [App\Http\Controllers\Backend\EmployeeAttendanceController::class, 'employeeAttendanceReport'])->name('employees.attendance.report');
    });
});

