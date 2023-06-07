<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;

use App\Http\Livewire\Bgmd\PageChargeSlip;
use App\Http\Livewire\Bgmd\PageEquipment;
use App\Http\Livewire\Bgmd\PageMachinery;
use App\Http\Livewire\Bgmd\PageMaintenanceRequest;
use App\Http\Livewire\Bgmd\PagePrintEquipmentList;
use App\Http\Livewire\Bgmd\PagePrintMachineryList;
use App\Http\Livewire\Bgmd\PagePrintMaintenanceRequestList;
use App\Http\Livewire\Bgmd\PagePrintVehicleList;
use App\Http\Livewire\Bgmd\PageVehicle;
use App\Http\Livewire\Bgmd\PageViewChargeSlip;
use App\Http\Livewire\Bgmd\PageViewEquipment;
use App\Http\Livewire\Bgmd\PageViewMachinery;
use App\Http\Livewire\Bgmd\PageViewMaintenanceRequest;
use App\Http\Livewire\Bgmd\PageViewVehicle;
use App\Http\Livewire\Bgmd\PageViewWorkOrderSlip;
use App\Http\Livewire\Bgmd\PageWorkOrderSlip;

use App\Http\Livewire\Settings\CompanyProfile;
use App\Http\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Route;

## Rpt
use App\Http\Livewire\Settings\ProfileSettings;
use App\Http\Livewire\Settings\UsersManagement;

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
// Privacy Policy
// Route::get('/privacy-policy', PrivacyPolicy::class)->name('Privacy Policy');

// Credentials
Route::get('/', Login::class)->name('login');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// For grouping prefix and middleware
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function()
{
    Route::get('{user_id}/dashboard', UserDashboard::class)->name('dashboard');

    Route::get('{user_id}/charge-slip-list', PageChargeSlip::class)->name('charge-slip-list');
    Route::get('{user_id}/equipment-list', PageEquipment::class)->name('equipment-list');
    Route::get('{user_id}/vehicle-list', PageVehicle::class)->name('vehicle-list');
    Route::get('{user_id}/machinery-list', PageMachinery::class)->name('machinery-list');
    Route::get('{user_id}/work-order-slip-list', PageWorkOrderSlip::class)->name('work-order-slip-list');
    Route::get('{user_id}/maintenance-request-list', PageMaintenanceRequest::class)->name('maintenance-request-list');

    Route::get('{user_id}/charge-slip-view/{id}', PageViewChargeSlip::class)->name('charge-slip-view');
    Route::get('{user_id}/equipment-view/{id}', PageViewEquipment::class)->name('equipment-view');
    Route::get('{user_id}/vehicle-view/{id}', PageViewVehicle::class)->name('vehicle-view');
    Route::get('{user_id}/machinery-view/{id}', PageViewMachinery::class)->name('machinery-view');
    Route::get('{user_id}/work-order-slip-view/{id}', PageViewWorkOrderSlip::class)->name('work-order-slip-view');
    Route::get('{user_id}/maintenance-request-view/{id}', PageViewMaintenanceRequest::class)->name('maintenance-request-view');

    Route::get('{user_id}/vehicle-print-list', PagePrintVehicleList::class)->name('vehicle-print-list');
    Route::get('{user_id}/equipment-print-list', PagePrintEquipmentList::class)->name('equipment-print-list');
    Route::get('{user_id}/machinery-print-list', PagePrintMachineryList::class)->name('machinery-print-list');
    Route::get('{user_id}/maintenance-request-print-list', PagePrintMaintenanceRequestList::class)->name('maintenance-request-print-list');

    ## USER MANAGEMENT
    Route::get('{user_id}/company-profile', CompanyProfile::class)->name('company-profile');
    Route::get('{user_id}/profile-settings', ProfileSettings::class)->name('profile-settings');
    Route::get('{user_id}/user-management', UsersManagement::class)->name('user-management');
});

// Route::get('/home', Register::class)->name('Register');
// For grouping prefix and middleware

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    // Route::get('{user_id}/dashboard', DocumentOverview::class)->name('Admin Dashboard');
});
