<?php

namespace App\View\Components\Dashboard;

use App\Models\ChargeSlip;
use App\Models\Equipment;
use App\Models\Machinery;
use App\Models\MaintenanceRequest;
use App\Models\Vehicle;
use App\Models\WorkOrder;
use Illuminate\View\Component;

class StatsV1 extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.dashboard.stats-v1',[
            'charge_slip_count' => ChargeSlip::count() ?? 0,
            'equipment_count' => Equipment::count() ?? 0,
            'machinery_count' => Machinery::count() ?? 0,
            'maintenance_request_count' => MaintenanceRequest::count() ?? 0,
            'vehicle_count' => Vehicle::count() ?? 0,
            'work_order_slip_count' => WorkOrder::count() ?? 0,
        ]);
    }
}
