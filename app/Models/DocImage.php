<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DocImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function imageUrl()
    {
        return $this->name
            ? Storage::disk('images')->url($this->name)
            : '';
    }
}
