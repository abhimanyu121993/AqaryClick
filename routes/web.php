<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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
// FrontEnd Routes
Route::resource('/',LoginController::class);


// Backend Routes
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    Route::resource('/user', UserController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::get('/role-has-permission',[PermissionController::class,'rolePermission'])->name('rolePermission');
    Route::post('/fetch-permission',[PermissionController::class,'fetchPermission'])->name('fetchPermission');
    Route::post('/assign-permission',[PermissionController::class,'assignPermission'])->name('assignPermission');

});
