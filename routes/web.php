<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\admin\BankController;
use App\Http\Controllers\admin\BrokerController;
use App\Http\Controllers\Admin\BuildingController;
use App\Http\Controllers\Admin\BuildingTypeController;
use App\Http\Controllers\admin\BusinessController;
use App\Http\Controllers\admin\ChequeController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\ContractController;
use App\Http\Controllers\admin\CurrencyController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\admin\ElectricityController;
use App\Http\Controllers\admin\InvoiceController;
use App\Http\Controllers\admin\LegalController;
use App\Http\Controllers\admin\NationalityController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\UnitTypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UnitFeatureController;
use App\Http\Controllers\admin\UnitFloorController;
use App\Http\Controllers\admin\UnitStatusController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;

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
    Route::get("/registration","regOverView");
    Route::get('/propertie-details','propertie_details');
    Route::get("/contect-us","contect");
    Route::post("/contact","contactSubmit")->name('contactus');
});

// Backend Routes
Route::get('/admin',[LoginController::class, 'index'])->name('admin');
Route::post('/login',[LoginController::class, 'store'])->name('login');

Route::group(['prefix'=>'admin','as'=>'admin.', 'middleware' => 'auth'],function(){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('/analytic-dashboard',[AdminController::class,'Analyticdashboard'])->name('analytic-dashboard');
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
    Route::resource('currency',CurrencyController::class);
    Route::post('/convert-currency',[CurrencyController::class,'convertAmtInSar'])->name('convert-currency');
    Route::get('/fetch-currency',[CurrencyController::class,'fetchCurrency'])->name('fetchCurrency');
    Route::get('/isactive-currency/{id}',[CurrencyController::class,'isActiveCurrency'])->name('activeCurrency');

    Route::resource('owner',OwnerController::class);
    Route::resource('business',BusinessController::class);
    Route::resource('customer',CustomerController::class);
    Route::resource('contract',ContractController::class);
    Route::get('bank-details/{id}',[BusinessController::class,'showBankDetail'])->name('showBankDetail');
    Route::get('company-details/{id}',[BusinessController::class,'companyOwnerDetail'])->name('companyOwnerDetail');
    Route::get('delete-company-details/{id}',[BusinessController::class,'usercompanydelete'])->name('companydelete');
    Route::get('delete-bank-details/{id}',[BusinessController::class,'userbankdelete'])->name('bankdelete');
    Route::get('overdue',[ContractController::class,'Overdue'])->name('Overdue');
    Route::get('fetchtenant/{tenant_name}',[ContractController::class,'fetchTenant'])->name('fetchTenant');
    Route::get('fetch-contract-lease/{contract_id}',[ContractController::class,'fetchContractLease'])->name('fetchContractLease');
    Route::get('fetch-tenant-details/{tenant_name}',[ContractController::class,'fetchTenantDetails'])->name('fetchTenantDetails');
    Route::get('fetchCountry/{country_id}',[BuildingController::class,'fetchCountry'])->name('fetchCountry');
    Route::get('fetch-building-details/{building_id}',[TenantController::class,'BuildingDetails'])->name('BuildingDetails');
    Route::get('fetchzone/{city_id}',[BuildingController::class,'fetchZone'])->name('fetchZone');
    Route::get('document/{id}',[BuildingController::class,'document'])->name('document');
    Route::get('tenant-document/{id}',[TenantController::class,'tenantdocument'])->name('tenantDocument');
    Route::resource('staff',StaffController::class);
    Route::resource('broker',BrokerController::class);
    Route::resource('legal',LegalController::class);
    Route::post('all-legal',[LegalController::class,'alllegal'])->name('alllegal');
    Route::get('fetch-tenant/{tenant_id}',[LegalController::class,'fetchData'])->name('fetchData');
    Route::resource('city',CityController::class);
    Route::resource('area',AreaController::class);
    Route::resource('nationality',NationalityController::class);
    Route::resource('bank',BankController::class);
    Route::resource('cheque',ChequeController::class);
    Route::get('/invoice-print',[InvoiceController::class,'printInvoice'])->name('printInvoice');
    Route::get('fetch-due-payment/{contract_id}',[InvoiceController::class,'duePayment'])->name('duePayments');
    Route::get('invoice-details/{contract_id}',[InvoiceController::class,'invoiceDetails'])->name('invoiceDetails');
    Route::get('fetch-building-tenant/{building_id}',[InvoiceController::class,'tenantBuilding'])->name('tenantBuilding');
    Route::get('fetch-contract-details/{tenant_id}',[InvoiceController::class,'contractDetails'])->name('contractDetails');
    Route::resource('invoice',InvoiceController::class);
    Route::resource('tenant',TenantController::class);
    Route::get('fetch-tenant-file-no/{file_no}',[TenantController::class,'fileNumber'])->name('fileNumber');
    Route::get('fetch-tenant-contract-no/{tenant_id}',[ContractController::class,'contractNumber'])->name('contractNumber');
    Route::get('fetchunit/{building_id}',[ElectricityController::class,'fetchUnit'])->name('fetchUnits');
    Route::get('fetch-qid/{name}',[ElectricityController::class,'fetchQid'])->name('fetchQid');
    Route::get('fetch-tenant-name',[ElectricityController::class,'fetchTenantName'])->name('fetchTenantName');
    Route::get('fetchContract',[ElectricityController::class,'fetchContract'])->name('fetchContract');
    Route::get('electricity-download/{path}',[ElectricityController::class,'getDownload'])->name('getDownload');
    Route::resource('electricity',ElectricityController::class);
    Route::get('/isactive/{id}',[UserController::class,'isActive'])->name('activeUser');
    Route::get('/isactive-customer/{id}',[CustomerController::class,'isActiveCustomer'])->name('activeCustomer');
    Route::get('lang/{lang}',[LanguageController::class,'switchLang'])->name('lang.switch');
    Route::get('receipt/{contract_code}',[ContractController::class,'contractReceipt'])->name('receipt');
    Route::get('/isreject/{id}',[ContractController::class,'isReject'])->name('activeContract');
    Route::get('/generate-pdf/{contract_code}', [ContractController::class, 'generatePDF'])->name('pdf');
});

Route::post('owner-registration',[HomeController::class,'store'])->name('owner-company');

Route::get('/optimize', function(){
    Artisan::call('optimize');
});
Route::get('/optimize-clear', function(){
    Artisan::call('optimize:clear');
});
