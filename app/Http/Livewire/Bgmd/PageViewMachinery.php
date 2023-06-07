<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\Machinery;
use Livewire\Component;

class PageViewMachinery extends Component
{
    public $data;
    public $images;

    public function mount($user_id, $id){
        $this->data = Machinery::with('file_images')->find($id);
        $this->images = $this->data->file_images
            ->where('imageable_type','machinery');
    }

    public function render()
    {
        return view('livewire.bgmd.page-view-machinery');
    }
}
