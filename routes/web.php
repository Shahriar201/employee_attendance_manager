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

    Route::prefix('employees')->group(function(){
        Route::get('/view', [App\Http\Controllers\Backend\EmployeeController::class, 'view'])->name('employees.view');
        Route::get('/add', [App\Http\Controllers\Backend\EmployeeController::class, 'add'])->name('employees.add');
        Route::post('/store', [App\Http\Controllers\Backend\EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/edit/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'edit'])->name('employees.edit');
        Route::post('/update/{id}', [App\Http\Controllers\Backend\EmployeeController::class, 'update'])->name('employees.update');
        Route::post('/delete', [App\Http\Controllers\Backend\EmployeeController::class, 'delete'])->name('employees.delete');
    });
});

