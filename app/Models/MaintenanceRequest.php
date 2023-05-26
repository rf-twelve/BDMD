<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images()
        { return $this->hasMany(MaintenanceRequestImage::class); }

    public function work_orders()
        { return $this->hasMany(WorkOrder::class); }
}
