<?php

namespace App\Http\Livewire\Bgmd;

use App\Models\ChargeSlip;
use App\Models\ChargeSlipItem;
use Livewire\Component;

class PageViewChargeSlip extends Component
{
    public $data;
    public int $qty;
    public $unit;
    public $particular;
    public float $unit_price;
    public float $total_price;
    public $images;
    public $item_no;
    public $grand_total;
    public $showFormModal = false;

    public function mount($user_id, $id){
        $this->qty = 0;
        $this->unit_price = 0;
        $this->total_price = 0;
        $this->images = [];
        $this->item_no = 1;
        $this->data = ChargeSlip::with('charge_slip_items')->find($id);
        $this->getGrandTotal();
    }

    public function updated($property_name){
        if($property_name == 'qty' && $this->qty >= 0){
            $this->total_price = $this->qty * $this->unit_price;
        }
        if($property_name == 'unit_price' && $this->unit_price >= 0){
            $this->total_price = $this->qty * $this->unit_price;
        }
    }

    public function addItem(){
        $this->qty = 0;
        $this->unit = '';
        $this->particular = '';
        $this->unit_price = 0;
        $this->total_price = 0;
        $this->showFormModal = true;
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

    public function removeItem($id){
        ChargeSlipItem::destroy($id);
        $this->data->refresh();
        $this->getGrandTotal();
        $this->notify('You\'ve deleted record successfully.');
    }

    public function getGrandTotal(){
        $this->grand_total = $this->data->charge_slip_items->sum('total_price');
    }

    public function render()
    {
        return view('livewire.bgmd.page-view-charge-slip');
    }
}
