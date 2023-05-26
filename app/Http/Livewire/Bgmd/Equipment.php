<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Equipment extends Component
{
    public $equip_id;
    public $equip;
    public $type;
    public $make;
    public $brand;
    public $model;
    public $year;
    public $plate_no;
    public $serial_no;
    public $engine_no;
    public $acquisition_date;
    public $acquisition_cost;
    public $remarks;
    public $is_vehicle;
    public $author_id;
    public $author_fullname;

    public $vehicle_images;
    public $maintenance_log;

    public function mount($id)
    {
        $this->setFields($id);
    }

    public function setFields($id)
    {
        $this->equip = Vehicle::query()
            ->with('images','author')
            ->find($id);
        $this->equip_id = $id;
        $this->type = $this->equip['type'];
        $this->make = $this->equip['make'];
        $this->brand = $this->equip['brand'];
        $this->model = $this->equip['model'];
        $this->year = $this->equip['year'];
        $this->plate_no = $this->equip['plate_no'];
        $this->serial_no = $this->equip['serial_no'];
        $this->engine_no = $this->equip['engine_no'];
        $this->acquisition_date = $this->equip['acquisition_date'];
        $this->acquisition_cost = $this->equip['acquisition_cost'];
        $this->remarks = $this->equip['remarks'];
        $this->is_vehicle = $this->equip['is_vehicle'];
        $this->author_id = $this->equip['author_id'];
        $this->author_fullname = $this->equip->author->fullname;
        $this->vehicle_images = $this->equip->images;
        $this->maintenance_log = $this->equip->maintenances;
    }

    public function render()
    {
        return view('livewire.bgmd.equipment');
    }

}
