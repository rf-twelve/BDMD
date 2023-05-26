<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\Vehicle;
use App\Models\VehicleImages;
use Livewire\Component;
use Livewire\WithFileUploads;

class EquipmentEdit extends Component
{
    use WithFileUploads;
    public $uid;
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

    public $temp_images;
    public $display_temp_images;

    public function rules() { return [
        // 'editing.type' => 'required|in:'.collect(VmsPar::TYPES)->keys()->implode(','),
        'make' => 'required',
        'brand' => 'required',
        'model' => 'required',
        'year' => 'required',
        'plate_no' => 'required',
        'serial_no' => 'required',
        'engine_no' => 'required',
        'acquisition_date' => 'required',
        'acquisition_cost' => 'required',
        'remarks' => 'nullable',
    ]; }

    public function mount($id){
        $this->setFields($id);
    }

    public function removeImage($id){
        $this->display_temp_images = $this->display_temp_images->reject(function ($item) use ($id) {
            return $item->id === $id;
        });
        VehicleImages::destroy($id);
        $this->notify('Image removed, Successfully!');

    }

    public function setFields($id){
        $equip = Vehicle::query()
            ->with('images')
            ->find($id);
        $this->display_temp_images = $equip->images ?? null;
        $this->uid = $equip['id'];
        $this->type = $equip['type'];
        $this->make = $equip['make'];
        $this->brand = $equip['brand'];
        $this->model = $equip['model'];
        $this->year = $equip['year'];
        $this->plate_no = $equip['plate_no'];
        $this->serial_no = $equip['serial_no'];
        $this->engine_no = $equip['engine_no'];
        $this->acquisition_date = $equip['acquisition_date'];
        $this->acquisition_cost = $equip['acquisition_cost'];
        $this->remarks = $equip['remarks'];
        $this->is_vehicle = $equip['is_vehicle'];
        $this->author_id = $equip['author_id'];

    }

    public function save()
    {
        $validated = $this->validate();
        $equip = Vehicle::find($this->uid);
        $equip->update($validated);
        if(count($this->temp_images)){
            foreach($this->temp_images as $item){
                $filename = $item->store('/','images');
                $equip->images()->create([
                    'name'=>$filename,
                    'author_id'=>auth()->user()->id,
                ]);
            }
        }
        return redirect()->route('equipments',['user_id'=>auth()->user()->id]);
        $this->notify('Equipment added, Successfully!');
    }

    public function render()
    {
        return view('livewire.bgmd.equipment-edit');
    }
}
