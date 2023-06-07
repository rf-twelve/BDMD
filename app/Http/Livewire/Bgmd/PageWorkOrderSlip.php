<?php

namespace App\Http\Livewire\Bgmd;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\FileImage;
use App\Models\MaintenanceRequest;
use App\Models\WorkOrder;

class PageWorkOrderSlip extends Component
{
    use WithFileUploads, WithPerPagePagination, WithBulkActions, WithCachedRows;

    public $assigned_worker;
    public $work_order_no;
    public $date_started;
    public $date_finished;
    public $supervised_by;
    public $supervised_date;
    public $approved_by;
    public $approved_date;
    public $received_by;
    public $received_date;
    public $status;
    public $maintenance_request_id;
    public $maintenance_requests;

    ## Deafault variable
    public $data_id;
    public $exist_image;
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
        $this->exist_image = null;
        $this->temp_image = null;
        $this->form_type = 'work order';
        $this->maintenance_requests = MaintenanceRequest::select('id','tn')->get();
    }

    public function getRowsQueryProperty()
    {
        return WorkOrder::query()
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
        $data = WorkOrder::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'work_order_no' => 'required',
            'assigned_worker' => 'required',
            'date_started' => 'required',
            'date_finished' => 'required',
            'supervised_by' => 'required',
            'supervised_date' => 'required',
            'approved_by' => 'required',
            'approved_date' => 'required',
            'received_by' => 'required',
            'received_date' => 'required',
            'status' => 'required',
            'maintenance_request_id' => 'required',
        ]);

        $valid['encoder_id'] = auth()->user()->id;

        if (isset($this->data_id)) {
            $model = WorkOrder::find($this->data_id);
            $model->update($valid);
        } else {
            $model = WorkOrder::create($valid);
        }

        // if (isset($this->temp_image)) {
        //     foreach ($this->temp_image as $key => $value) {
        //         $filename = $value->store('/','images');
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
        return to_route('work-order-slip-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->data_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        WorkOrder::destroy($this->data_id);

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

    public function setFields($data)
    {

        $this->assigned_worker = $data['assigned_worker'];
        $this->work_order_no = $data['work_order_no'];
        $this->date_started = $data['date_started'];
        $this->date_finished = $data['date_finished'];
        $this->supervised_by = $data['supervised_by'];
        $this->supervised_date = $data['supervised_date'];
        $this->approved_by = $data['approved_by'];
        $this->approved_date = $data['approved_date'];
        $this->received_by = $data['received_by'];
        $this->received_date = $data['received_date'];
        $this->status = $data['status'];
        $this->maintenance_request_id = $data['maintenance_request_id'];

        ## Constant
        $this->data_id = $data['id'];
        // $this->exist_image = $data->file_images->where('imageable_type',$this->form_type);
        // $this->temp_image = null;
    }

    public function resetFields()
    {
        $this->assigned_worker ='';
        $this->work_order_no ='';
        $this->date_started ='';
        $this->date_finished ='';
        $this->supervised_by ='';
        $this->supervised_date ='';
        $this->approved_by ='';
        $this->approved_date ='';
        $this->received_by ='';
        $this->received_date ='';
        $this->status ='';
        $this->maintenance_request_id ='';
        ## Default
        $this->data_id = null;
        $this->exist_image = null;
        $this->temp_image = null;
    }

    public function render()
    {
        return view('livewire.bgmd.page-work-order-slip',[
            'records' => $this->rows
        ]);
    }
}
