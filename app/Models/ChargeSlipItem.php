<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeSlipItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images()
        { return $this->hasMany(ChargeSlipItemImage::class); }
}
