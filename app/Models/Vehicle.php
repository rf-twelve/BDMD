<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images()
        { return $this->hasMany(VehicleImages::class); }

    public function maintenances()
        { return $this->hasMany(MaintenanceRequest::class); }

    public function author()
        { return $this->belongsTo(User::class, 'author_id'); }

    public function getUserFullnameAttribute(){
            return User::find($this->author_id) ? (User::find($this->author_id))->fullname : '(Unknown)';
        }

}
