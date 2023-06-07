<?php

namespace App\Http\Livewire\Bgmd;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Equipment;
use App\Models\FileImage;
use App\Models\Machinery;
use App\Models\MaintenanceRequest;
use App\Models\Vehicle;

class PageMaintenanceRequest extends Component
{
    use WithFileUploads, WithPerPagePagination, WithBulkActions, WithCachedRows;

    public $tn;
    public $class;
    public $class_id;
    public $for;
    public $priority_type;
    // public $last_repair_date;
    // public $last_repair_nature;
    public $defects;
    public $requested_by;
    public $requested_date;
    public $received_by;
    public $received_date;
    public $inspected_by;
    public $inspected_date;
    public $comments;
    public $parts_needed;
    public $approved_by;
    public $approved_date;
    public $work_completed_on;
    public $status;
    public $classess;
    public $vehicles;
    public $equipments;
    public $machineries;

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
        $this->classess = [];
        $this->vehicles = Vehicle::select('id','name')->get();
        $this->equipments = Equipment::select('id','name')->get();
        $this->machineries = Machinery::select('id','name')->get();
        $this->exist_image = null;
        $this->temp_image = null;
        $this->form_type = 'maintenance request';
    }

    public function updated($property){
        if ($property == 'class') {
            switch ($this->class) {
                case 'equipment':
                    $this->classess = $this->equipments;
                    break;
                case 'machinery':
                    $this->classess = $this->machineries;
                    break;
                case 'vehicle':
                    $this->classess = $this->vehicles;
                    break;

                default:
                    # code...
                    break;
            }
        }
    }

    public function getRowsQueryProperty()
    {
        return MaintenanceRequest::query()
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
        $data = MaintenanceRequest::find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'tn' => 'required',
            'class' => 'required',
            'class_id' => 'nullable',
            'for' => 'required',
            'priority_type' => 'required',
            'defects' => 'required',
            'requested_by' => 'required',
            'requested_date' => 'required',
            'received_by' => 'required',
            'received_date' => 'required',
            'inspected_by' => 'required',
            'inspected_date' => 'required',
            'comments' => 'required',
            'parts_needed' => 'required',
            'approved_by' => 'required',
            'approved_date' => 'required',
            'work_completed_on' => 'required',
            'status' => 'required',
        ]);

        $valid['encoder_id'] = auth()->user()->id;

        if (isset($this->data_id)) {
            $model = MaintenanceRequest::find($this->data_id);
            $model->update($valid);
        } else {
            $model = MaintenanceRequest::create($valid);
        }

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
        return to_route('maintenance-request-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->data_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        MaintenanceRequest::destroy($this->data_id);

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
        $this->tn = $data['tn'];
        $this->class = $data['class'];
        $this->class_id = $data['class_id'];
        $this->for = $data['for'];
        $this->priority_type = $data['priority_type'];
        // $this->last_repair_date = $data['last_repair_date'];
        // $this->last_repair_nature = $data['last_repair_nature'];
        $this->defects = $data['defects'];
        $this->requested_by = $data['requested_by'];
        $this->requested_date = $data['requested_date'];
        $this->received_by = $data['received_by'];
        $this->received_date = $data['received_date'];
        $this->inspected_by = $data['inspected_by'];
        $this->inspected_date = $data['inspected_date'];
        $this->comments = $data['comments'];
        $this->parts_needed = $data['parts_needed'];
        $this->approved_by = $data['approved_by'];
        $this->approved_date = $data['approved_date'];
        $this->work_completed_on = $data['work_completed_on'];
        $this->status = $data['status'];

        ## Constant
        $this->data_id = $data['id'];
        // $this->exist_item = $data->charge_slip_items;
        // $this->exist_image = $data->file_images->where('imageable_type',$this->form_type);
        $this->temp_image = null;
    }

    public function resetFields()
    {
        $this->tn = date('Y-md-hms').'-'.rand(1000,date('Y'));
        $this->class = '';
        $this->class_id = '';
        $this->for = '';
        $this->priority_type = '';
        // $this->last_repair_date = '';
        // $this->last_repair_nature = '';
        $this->defects = '';
        $this->requested_by = '';
        $this->requested_date = '';
        $this->received_by = '';
        $this->received_date = '';
        $this->inspected_by = '';
        $this->inspected_date = '';
        $this->comments = '';
        $this->parts_needed = '';
        $this->approved_by = '';
        $this->approved_date = '';
        $this->work_completed_on = '';
        $this->status = '';
        ## Default
        $this->data_id = null;
        $this->exist_item = null;
        $this->exist_image = null;
        $this->temp_image = null;
    }

    public function render()
    {
        return view('livewire.bgmd.page-maintenance-request',[
            'records' => $this->rows
        ]);
    }
}
