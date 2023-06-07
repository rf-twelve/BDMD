<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machinery extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function file_images()
    {
        return $this->hasMany(FileImage::class, 'imageable_id');
    }
}
