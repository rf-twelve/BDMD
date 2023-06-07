<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\Equipment;
use Livewire\Component;

class PageViewEquipment extends Component
{
    public $data;
    public $images;

    public function mount($user_id, $id){
        $this->data = Equipment::with('file_images')->find($id);
        $this->images = $this->data->file_images
            ->where('imageable_type','equipment');
    }

    public function render()
    {
        return view('livewire.bgmd.page-view-equipment');
    }
}
