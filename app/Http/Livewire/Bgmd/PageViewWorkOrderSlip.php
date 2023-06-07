<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\WorkDescription;
use App\Models\WorkOrder;
use Livewire\Component;

class PageViewWorkOrderSlip extends Component
{
    public $data;
    public $item_no = 1;
    public $images = [];
    public $description;
    public $estimated_man_hours;
    public $remarks;
    public $status;
    public $showFormModal = false;

    public function mount($user_id, $id){
        $this->data = WorkOrder::with('work_descriptions')->find($id);
    }

    public function addItem(){
        $this->description = '';
        $this->estimated_man_hours = '';
        $this->remarks = '';
        $this->status = '';
        $this->showFormModal = true;
    }

    public function removeItem($id){
        WorkDescription::destroy($id);
        $this->data->refresh();
        $this->notify('You\'ve deleted record successfully.');
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'description' => 'required',
            'estimated_man_hours' => 'required',
            'remarks' => 'nullable',
            'status' => 'nullable',
        ]);

        $this->data->work_descriptions()->create($valid);
        $this->data->refresh();
        $this->notify('You\'ve save record successfully.');
        $this->showFormModal = false;
    }

    public function render()
    {
        return view('livewire.bgmd.page-view-work-order-slip');
    }
}
