<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\BuildingTypeController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UnitTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UnitFeatureController;
use App\Http\Controllers\admin\UnitFloorController;
use App\Http\Controllers\admin\UnitStatusController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
Route::controller(HomeController::class)->group(function(){
    Route::get("/","index");
    Route::get("/about-us","about");
    Route::get("/properties","properties");
    Route::get('/propertie-details','propertie_details');
    Route::get("/contect-us","contect");
});












// Backend Routes
Route::get('/admin',[LoginController::class, 'index'])->name('admin');
Route::post('/login',[LoginController::class, 'store'])->name('login');

Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => 'auth'],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    Route::resource('/user', UserController::class);
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::get('/role-has-permission',[PermissionController::class,'rolePermission'])->name('rolePermission');
    Route::post('/fetch-permission',[PermissionController::class,'fetchPermission'])->name('fetchPermission');
    Route::post('/assign-permission',[PermissionController::class,'assignPermission'])->name('assignPermission');
    Route::resource('buildingtype',BuildingTypeController::class);
    Route::resource('register_building',BuildingController::class);
    Route::resource('unit-type',UnitTypeController::class);
    Route::resource('unit-type',UnitTypeController::class);
    Route::resource('unit-status',UnitStatusController::class);
    Route::resource('unit-floor',UnitFloorController::class);
    Route::resource('unit-feature',UnitFeatureController::class);
    Route::get('user-profile/{id}',[UserController::class,'profile'])->name('profile');
    Route::get('edit-user-profile/{id}',[UserController::class,'editProfile'])->name('editprofile');
    Route::post('user-profile-update',[UserController::class,'updateProfile'])->name('userupdate');
    Route::post('user-pass-update',[UserController::class,'updatePassword'])->name('uppass');

    Route::resource('building',BuildingController::class);
    Route::resource('unit',UnitController::class);
    Route::resource('owner',OwnerController::class);
    Route::resource('customer',CustomerController::class);

    Route::get('bank-details/{id}',[CustomerController::class,'showBankDetail'])->name('showBankDetail');
    Route::get('company-details/{id}',[CustomerController::class,'companyOwnerDetail'])->name('companyOwnerDetail');
    Route::get('delete-company-details/{id}',[CustomerController::class,'usercompanydelete'])->name('companydelete');
    Route::get('delete-bank-details/{id}',[CustomerController::class,'userbankdelete'])->name('bankdelete');

    Route::resource('city',CityController::class);
    Route::resource('area',AreaController::class);


});


Route::get('/optimize', function(){
    Artisan::call('optimize');
});
Route::get('/optimize-clear', function(){
    Artisan::call('optimize:clear');
});
