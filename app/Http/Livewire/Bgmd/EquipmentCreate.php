<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithFileUploads;

class EquipmentCreate extends Component
{
    use WithFileUploads;
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

    public function save()
    {
        $validated = $this->validate();
        $validated['type'] = $this->make;
        $validated['is_vehicle'] = 0;
        $validated['author_id'] = auth()->user()->id;
        $equip = Vehicle::create($validated);
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

    // public function updatedTempImages()
    // {
    //     $this->display_temp_images = $this->temp_images->temporaryUrl() ?? '';
    // }

    public function render()
    {
        return view('livewire.bgmd.equipment-create');
    }
}
