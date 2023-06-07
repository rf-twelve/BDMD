<?php

namespace App\Http\Livewire\Bgmd;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\FileImage;
use App\Models\Vehicle;

class PageVehicle extends Component
{
    use WithFileUploads, WithPerPagePagination, WithBulkActions, WithCachedRows;

    public $data_id;
    public $name;
    public $description;
    public $type;
    public $make;
    public $brand;
    public $model;
    public $plate_no;
    public $serial_no;
    public $engine_no;
    public $acquisition_date;
    public $acquisition_cost;
    public $warranty_expiration;
    public $located;
    public $remarks;
    ## Deafault variable
    public $exist_image;
    public $temp_image;
    public $form_type;
    ## Modal initialize
    public $showDeleteSingleRecordModal = false;
    public $showFormModal = false;
    public $filters = [
        'search' => '',
        'status' => '',
        'sort-field' => 'name',
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
        $this->form_type = 'machinery';
    }

    public function getRowsQueryProperty()
    {
        return Vehicle::query()
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
        $data = Vehicle::with('file_images')->find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'type' => 'required',
            'make' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'plate_no' => 'required',
            'serial_no' => 'required',
            'engine_no' => 'required',
            'acquisition_date' => 'required',
            'acquisition_cost' => 'required',
            'warranty_expiration' => 'required',
            'located' => 'nullable',
            'remarks' => 'nullable',
        ]);

        $valid['encoder_id'] = auth()->user()->id;

        if (isset($this->data_id)) {
            $model = Vehicle::find($this->data_id);
            $model->update($valid);
        } else {
            $model = Vehicle::create($valid);
        }

        if (isset($this->temp_image)) {
            foreach ($this->temp_image as $key => $value) {
                $filename = $value->store('/','images');
                $model->file_images()->create([
                    'name' => $filename,
                    'imageable_type' => $this->form_type,
                ]);
            }
        }

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
        return to_route('vehicle-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->data_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        Vehicle::destroy($this->data_id);

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
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->type = $data['type'];
        $this->make = $data['make'];
        $this->brand = $data['brand'];
        $this->model = $data['model'];
        $this->plate_no = $data['plate_no'];
        $this->serial_no = $data['serial_no'];
        $this->engine_no = $data['engine_no'];
        $this->acquisition_date = $data['acquisition_date'];
        $this->acquisition_cost = $data['acquisition_cost'];
        $this->warranty_expiration = $data['warranty_expiration'];
        $this->located = $data['located'];
        $this->remarks = $data['remarks'];

        ## Constant
        $this->data_id = $data['id'];
        $this->exist_image = $data->file_images->where('imageable_type',$this->form_type);
        $this->temp_image = null;
    }

    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->type = '';
        $this->make = '';
        $this->brand = '';
        $this->model = '';
        $this->plate_no = '';
        $this->serial_no = '';
        $this->engine_no = '';
        $this->acquisition_date = '';
        $this->acquisition_cost = '';
        $this->warranty_expiration = '';
        $this->located = '';
        $this->remarks = '';
        ## Default
        $this->data_id = null;
        $this->exist_image = null;
        $this->temp_image = null;
    }

    public function render()
    {
        return view('livewire.bgmd.page-vehicle',[
            'records' => $this->rows
        ]);
    }
}
