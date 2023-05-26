<?php

namespace App\Http\Livewire\Dts;

use App\Models\Doc;
use App\Models\DocImage;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentEdit extends Component
{
    use WithFileUploads;

    public $doc_id;
    public $tn;
    public $type; //draft, office, public
    public $class;
    public $date;
    public $time;
    public $received_by;
    public $title;
    public $origin;
    public $nature;
    public $for;
    public $remarks;
    public $author_id;
    public $author_office;
    public $updated_by;
    public $shared_office;

    public $offices = [];
    public $tracks;
    public $file_images = [];
    public $temp_images = [];
    public $display_temp_images = [];

    public $recipient_office;
    public $recipient_person;

    public function rules() { return [
        // 'editing.type' => 'required|in:'.collect(VmsPar::TYPES)->keys()->implode(','),
        'tn' => 'required',
        'type' => 'required',
        'class' => 'required',
        'date' => 'required',
        'received_by' => 'nullable',
        'title' => 'nullable',
        'origin' => 'nullable',
        'nature' => 'nullable',
        'for' => 'required',
        'remarks' => 'nullable',
        'updated_by' => 'nullable'
    ]; }

    public function setFields($data)
    {
        $this->tn = $data['tn'];
        $this->type = $data['type'];
        $this->class = $data['class'];
        $this->date = $data['date'];
        $this->received_by = $data['received_by'];
        $this->title = $data['title'];
        $this->origin = $data['origin'];
        $this->nature = $data['nature'];
        $this->for = $data['for'];
        $this->remarks = $data['remarks'];
        $this->shared_office = $data['shared_office'];
        $this->file_images = $data->images;
        $this->offices = $data->offices;
        $this->tracks = $data->tracks;
    }
    public function resetFields()
    {
        $this->tn = '';
        $this->type = '';
        $this->class = '';
        $this->date = '';
        $this->received_by = '';
        $this->title = '';
        $this->origin = '';
        $this->nature = '';
        $this->for = '';
        $this->remarks = '';
        $this->shared_office = '';
    }

    public function mount($id)
    {
        $this->doc_id = $id;
        $record = Doc::query()
            ->with('action_takens','images','tracks','offices')
            ->Find($id);
        // dd($record);
        $this->setFields($record);
        // $this->time = time();
        // $this->date = date('Y-m-d', $this->time);
        // $this->file_images = [];
        // $this->temp_images = [];

    }

    public function updatedTempImages(){
        // $this->validate(['temp_images' => 'image|mimes:jpg,png,jpeg']);
        $this->display_temp_images = $this->temp_images;
    }


    public function save()
    {
        $date_time_current = date('Y-m-d H:i:s', $this->time);
        if (count($this->tracks) > 0) {
            $first = $this->tracks->first();
            $diff = Carbon::parse($first->created_at)->diffForHumans(Carbon::parse($date_time_current), [
                'parts' => 6,
                'short' => true,
                'syntax' => Carbon::DIFF_ABSOLUTE,
            ]);
        }else{
            $diff = "N/A";
        }

        $validated = $this->validate();
        $validated['updated_by'] = auth()->user()->id;
        if(isset($this->doc_id)){
            $doc = Doc::find($this->doc_id);
            $doc->update($validated);
            // Storing Images
            if(count($this->temp_images)){
                foreach($this->temp_images as $item){
                    $filename = $item->store('/','images');
                    $doc->images()->create(['name'=>$filename]);
                }
            }

            // Action: Received, Created, Sent, Released, Approved
            // Status: pending", "in progress", or "completed"
            switch ($this->type) {
                case 'draft':
                    $doc->tracks()->create([
                        'action' => 'Updated',
                        'remarks' => 'Document has been modified.',
                        'on_transit' => false,
                        'status' => 'edited',
                        'assigned_to' => 'N/A',
                        'deadline' => 'N/A',
                        'time_elapse' => $diff,
                        'created_at' => $date_time_current,
                        'updated_at' => $date_time_current,
                        'office_id' => auth()->user()->office_id,
                        'user_id' => auth()->user()->id,
                    ]);
                    $this->notify('Document has been modified, Successfully!');
                    return redirect()->route('my-documents',['user_id'=>auth()->user()->id]);
                    break;
                case 'office':
                    $doc->tracks()->create([
                        'action' => 'Updated',
                        'remarks' => 'Document has been modified.',
                        'on_transit' => false,
                        'status' => 'edited',
                        'assigned_to' => 'N/A',
                        'deadline' => 'N/A',
                        'time_elapse' => $diff,
                        'created_at' => $date_time_current,
                        'updated_at' => $date_time_current,
                        'office_id' => auth()->user()->office_id,
                        'user_id' => auth()->user()->id,
                    ]);
                    $this->notify('Document has been modified, Successfully!');
                    return redirect()->route('office-documents',['user_id'=>auth()->user()->id]);
                    break;
                case 'public':
                    $doc->tracks()->create([
                        'action' => 'Updated',
                        'remarks' => 'Document has been modified.',
                        'on_transit' => false,
                        'status' => 'edited',
                        'assigned_to' => 'N/A',
                        'deadline' => 'N/A',
                        'time_elapse' => $diff,
                        'created_at' => $date_time_current,
                        'updated_at' => $date_time_current,
                        'office_id' => auth()->user()->office_id,
                        'user_id' => auth()->user()->id,
                    ]);
                    $this->notify('Document has been modified, Successfully!');
                    return redirect()->route('public-documents',['user_id'=>auth()->user()->id]);
                    break;

                default:
                    # code...
                    break;
            }




        }


    }

    public function removeImage($id){
        DocImage::destroy($id);
        $this->notify("Image removed, Successfuly!");
        $this->mount($this->doc_id);
    }


    public function render()
    {
        return view('livewire.dts.document-edit');
    }
}
