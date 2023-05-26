<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChargeSlip extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function charge_slip_items()
        { return $this->hasMany(ChargeSlipItem::class); }
}
