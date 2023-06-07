<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\MaintenanceRequest;
use App\Models\WorkOrder;
use Livewire\Component;

class PageViewMaintenanceRequest extends Component
{
    public $data;
    public $data_id;
    public $images;
    public $item_no;
    public $showFormModal = false;
    public $showDeleteSingleRecordModal = false;

    public function mount($user_id, $id){
        $this->images = [];
        $this->item_no = 1;
        $this->data = MaintenanceRequest::with('work_orders')->find($id);
    }

    public function updated($property_name){
    }

    public function addItem(){
        // $this->qty = 0;
        // $this->unit = '';
        // $this->particular = '';
        // $this->unit_price = 0;
        // $this->total_price = 0;
        // $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'qty' => 'required',
            'unit' => 'required',
            'particular' => 'required',
            'unit_price' => 'required',
            'total_price' => 'required',
        ]);

        $this->data->charge_slip_items()->create($valid);
        $this->data->refresh();
        $this->getGrandTotal();
        $this->notify('You\'ve save record successfully.');
        $this->showFormModal = false;
    }

    public function toggleView($id)
    {
        return to_route('work-order-slip-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->data_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSelectedRecord(){
        WorkOrder::destroy($this->data_id);
        $this->data->refresh();
        $this->notify('You\'ve deleted record successfully.');
    }

    public function render()
    {
        return view('livewire.bgmd.page-view-maintenance-request');
    }
}
