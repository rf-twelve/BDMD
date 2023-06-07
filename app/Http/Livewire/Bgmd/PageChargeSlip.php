<?php

namespace App\Http\Livewire\Bgmd;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\ChargeSlip;
use App\Models\ChargeSlipItem;
use App\Models\FileImage;
use App\Models\Vehicle;

class PageChargeSlip extends Component
{
    use WithFileUploads, WithPerPagePagination, WithBulkActions, WithCachedRows;

    public $tn;
    public $date;
    public $to;
    public $from;
    public $for;
    public $prepared_by;
    public $noted_by;
    public $vehicle_id;
    public $vehicles;

    ## Deafault variable
    public $data_id;
    public $exist_image;
    public $exist_item;
    public $temp_image;
    public $form_type;
    ## Modal initialize
    public $showDeleteSingleRecordModal = false;
    public $showFormModal = false;
    public $filters = [
        'search' => '',
        'status' => '',
        'sort-field' => 'id',
        'sort-direction' => 'asc',
        'status' => '',
        'amount-min' => null,
        'amount-max' => null,
        'date-min' => null,
        'date-max' => null,
    ];

    public function mount(){
        $this->data_id = null;
        $this->vehicles = Vehicle::get();
        $this->exist_image = null;
        $this->temp_image = null;
        $this->form_type = 'charge slip';
    }

    public function getRowsQueryProperty()
    {
        return ChargeSlip::query()
            ->when($this->filters['search'], fn($query, $search) => $query->where($this->filters['sort-field'], 'like','%'.$search.'%'))
            ->orderBy($this->filters['sort-field'], $this->filters['sort-direction']);
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function sortBy($field){

        if($this->filters['sort-field'] === $field) {
            $this->filters['sort-by'] = $this->filters['sort-by'] === 'asc' ? 'desc' : 'asc';
        } else {
            $this->filters['sort-by'] = 'asc';
        }
        $this->filters['sort-field'] = $field;
    }

    public function toggleCreateRecordModal()
    {
        $this->resetFields();
        $this->showFormModal = true;
    }

    public function toggleEditRecordModal($id)
    {
        $data = ChargeSlip::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'tn' => 'required',
            'date' => 'required',
            'to' => 'required',
            'from' => 'required',
            'for' => 'required',
            'prepared_by' => 'required',
            'noted_by' => 'required',
            'vehicle_id' => 'required',
        ]);

        $valid['encoder_id'] = auth()->user()->id;

        if (isset($this->data_id)) {
            $model = ChargeSlip::find($this->data_id);
            $model->update($valid);
        } else {
            $model = ChargeSlip::create($valid);
        }

        ## IF IMAGES EXIST
        // if (isset($this->temp_image)) {
        //     foreach ($this->temp_image as $key => $value) {
        //         $model->file_images()->create([
        //             'name' => $filename,
        //             'imageable_type' => $this->form_type,
        //         ]);
        //     }
        // }

        $this->notify('You\'ve save record successfully.');
        $this->resetFields();
        $this->showFormModal = false;
    }

    public function closeRecord()
    {
        $this->showFormModal = false;
        $this->resetFields();
    }

    public function toggleView($id)
    {
        return to_route('charge-slip-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->data_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        ChargeSlip::destroy($this->data_id);

        $this->showDeleteSingleRecordModal = false;

        $this->resetFields();

        $this->notify('You\'ve deleted record successfully.');
    }

    public function removeImage($id,$key)
    {
        FileImage::destroy($id);

        $this->exist_image->forget($key);

        $this->notify('You\'ve removed image successfully.');
    }

    public function removeItem($id,$key)
    {
        ChargeSlipItem::destroy($id);

        $this->exist_item->forget($key);

        $this->notify('You\'ve removed image successfully.');
    }

    public function setFields($data)
    {
        $this->tn = $data['tn'];
        $this->date = $data['date'];
        $this->to = $data['to'];
        $this->from = $data['from'];
        $this->for = $data['for'];
        $this->prepared_by = $data['prepared_by'];
        $this->noted_by = $data['noted_by'];
        $this->vehicle_id = $data['vehicle_id'];

        ## Constant
        $this->data_id = $data['id'];
        $this->exist_item = $data->charge_slip_items;
        // $this->exist_image = $data->file_images->where('imageable_type',$this->form_type);
        $this->temp_image = null;
    }

    public function resetFields()
    {
        $this->tn = '';
        $this->date = '';
        $this->to = '';
        $this->from = '';
        $this->for = '';
        $this->prepared_by = '';
        $this->noted_by = '';
        $this->vehicle_id = '';
        ## Default
        $this->data_id = null;
        $this->exist_item = null;
        $this->exist_image = null;
        $this->temp_image = null;
    }

    public function render()
    {
        return view('livewire.bgmd.page-charge-slip',[
            'records' => $this->rows
        ]);
    }
}
