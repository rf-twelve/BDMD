<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocTracking extends Model
{
    use HasFactory;
    protected $guarded = [];

    // id
    // action
    // remarks
    // on_transit
    // status
    // assigned_to
    // deadline
    // time_elapse
    // created_at
    // updated_at
    // doc_id
    // office_id
    // user_id

    public function getUserFullnameAttribute(){
        return User::find($this->user_id) ? (User::find($this->user_id))->fullname : '(Unknown)';
    }

    public function getOfficeNameAttribute(){
        return Office::find($this->office_id) ? (Office::find($this->office_id))->name : '(Unknown)';
    }
}
