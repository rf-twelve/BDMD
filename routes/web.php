<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Bgmd\ChargeSlip;
use App\Http\Livewire\Bgmd\ChargeSlipCreate;
use App\Http\Livewire\Bgmd\ChargeSlipEdit;
use App\Http\Livewire\Bgmd\ChargeSlips;
use App\Http\Livewire\Bgmd\Equipment;
use App\Http\Livewire\Bgmd\EquipmentCreate;
use App\Http\Livewire\Bgmd\EquipmentEdit;
use App\Http\Livewire\Bgmd\Equipments;
use App\Http\Livewire\Bgmd\MaintenanceRequestForm;
use App\Http\Livewire\Bgmd\MaintenanceRequestFormCreate;
use App\Http\Livewire\Bgmd\MaintenanceRequestFormEdit;
use App\Http\Livewire\Bgmd\MaintenanceRequestForms;
use App\Http\Livewire\Bgmd\Vehicle;
use App\Http\Livewire\Bgmd\VehicleCreate;
use App\Http\Livewire\Bgmd\VehicleEdit;
use App\Http\Livewire\Bgmd\Vehicles;
use App\Http\Livewire\Bgmd\WorkOrderSlip;
use App\Http\Livewire\Bgmd\WorkOrderSlipCreate;
use App\Http\Livewire\Bgmd\WorkOrderSlipEdit;
use App\Http\Livewire\Bgmd\WorkOrderSlips;
use App\Http\Livewire\Dts\PrivacyPolicy;
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
Route::get('/privacy-policy', PrivacyPolicy::class)->name('Privacy Policy');

// Credentials
Route::get('/', Login::class)->name('login');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// For grouping prefix and middleware
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function()
{
    Route::get('{user_id}/dashboard', UserDashboard::class)->name('dashboard');

    Route::get('{user_id}/charge-slips', ChargeSlips::class)->name('charge-slips');
    Route::get('{user_id}/charge-slip/{id}', ChargeSlip::class)->name('charge-slip');
    Route::get('{user_id}/charge-slip/{id}/create', ChargeSlipCreate::class)->name('charge-slip.create');
    Route::get('{user_id}/charge-slip/{id}/edit', ChargeSlipEdit::class)->name('charge-slip.edit');

    Route::get('{user_id}/equipments', Equipments::class)->name('equipments');
    Route::get('{user_id}/equipment/{id}', Equipment::class)->name('equipment');
    Route::get('{user_id}/equipment/{id}/create', EquipmentCreate::class)->name('equipment.create');
    Route::get('{user_id}/equipment/{id}/edit', EquipmentEdit::class)->name('equipment.edit');

    Route::get('{user_id}/maintenance-request-forms', MaintenanceRequestForms::class)->name('maintenance-request-forms');
    Route::get('{user_id}/maintenance-request-form/{id}', MaintenanceRequestForm::class)->name('maintenance-request-form');
    Route::get('{user_id}/maintenance-request-form/{id}/create', MaintenanceRequestFormCreate::class)->name('maintenance-request-form.create');
    Route::get('{user_id}/maintenance-request-form/{id}/edit', MaintenanceRequestFormEdit::class)->name('maintenance-request-form.edit');

    Route::get('{user_id}/vehicles', Vehicles::class)->name('vehicles');
    Route::get('{user_id}/vehicle/{id}', Vehicle::class)->name('vehicle');
    Route::get('{user_id}/vehicle/{id}/create', VehicleCreate::class)->name('vehicle.create');
    Route::get('{user_id}/vehicle/{id}/edit', VehicleEdit::class)->name('vehicle.edit');

    Route::get('{user_id}/work-order-slips', WorkOrderSlips::class)->name('work-order-slips');
    Route::get('{user_id}/work-order-slip/{id}', WorkOrderSlip::class)->name('work-order-slip');
    Route::get('{user_id}/work-order-slip/{id}/create', WorkOrderSlipCreate::class)->name('work-order-slip.create');
    Route::get('{user_id}/work-order-slip/{id}/edit', WorkOrderSlipEdit::class)->name('work-order-slip.edit');

    Route::get('{user_id}/vehicle-maintenance-log/{vehicle_id}', ChargeSlipCreate::class)->name('vehicle-maintenance-log');
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
