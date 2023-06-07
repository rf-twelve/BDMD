<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\Vehicle;
use Livewire\Component;

class PageViewVehicle extends Component
{
    public $data;
    public $images;

    public function mount($user_id, $id){
        $this->data = Vehicle::with('file_images')->find($id);
        $this->images = $this->data->file_images
            ->where('imageable_type','vehicle');
    }

    public function render()
    {
        return view('livewire.bgmd.page-view-vehicle');
    }
}
