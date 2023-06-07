<?php

namespace App\Http\Livewire\Bgmd;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Http\Livewire\DataTable\WithBulkActions;
use App\Http\Livewire\DataTable\WithCachedRows;
use App\Models\Equipment;
use App\Models\FileImage;

class PageEquipment extends Component
{
    use WithFileUploads, WithPerPagePagination, WithBulkActions, WithCachedRows;

    public $data_id;
    public $name;
    public $description;
    public $brand;
    public $serial_no;
    public $acquisition_date;
    public $acquisition_cost;
    public $warranty_expiration;
    public $located;
    public $remarks;
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
        $this->form_type = 'equipment';
    }

    public function getRowsQueryProperty()
    {
        return Equipment::query()
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
        $data = Equipment::with('file_images')->find($id);
        $this->setFields($data);
        $this->showFormModal = true;
    }

    public function saveRecord()
    {
        $valid = $this->validate([
            'name' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'serial_no' => 'required',
            'acquisition_date' => 'required',
            'acquisition_cost' => 'required',
            'warranty_expiration' => 'required',
            'located' => 'required',
            'remarks' => 'nullable',
        ]);

        $valid['encoder_id'] = auth()->user()->id;

        if (isset($this->data_id)) {
            $model = Equipment::find($this->data_id);
            $model->update($valid);
        } else {
            $model = Equipment::create($valid);
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
        return to_route('equipment-view',['user_id'=>auth()->user()->id, 'id'=> $id]);
    }

    public function toggleDeleteSingleRecordModal($id)
    {
        $this->data_id = $id;
        $this->showDeleteSingleRecordModal = true;
    }

    public function deleteSingleRecord()
    {
        Equipment::destroy($this->data_id);

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
        $this->data_id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->brand = $data['brand'];
        $this->serial_no = $data['serial_no'];
        $this->acquisition_date = $data['acquisition_date'];
        $this->acquisition_cost = $data['acquisition_cost'];
        $this->warranty_expiration = $data['warranty_expiration'];
        $this->located = $data['located'];
        $this->remarks = $data['remarks'];
        $this->exist_image = $data->file_images->where('imageable_type',$this->form_type);
        $this->temp_image = null;
    }

    public function resetFields()
    {
        $this->data_id = null;
        $this->name = '';
        $this->description = '';
        $this->brand = '';
        $this->serial_no = '';
        $this->acquisition_date = '';
        $this->acquisition_cost = '';
        $this->warranty_expiration = '';
        $this->located = '';
        $this->remarks = '';
        $this->exist_image = null;
        $this->temp_image = null;
    }

    public function render()
    {
        return view('livewire.bgmd.page-equipment',[
            'records' => $this->rows
        ]);
    }
}
