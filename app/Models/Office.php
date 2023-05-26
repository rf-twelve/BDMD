<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['id' => 'integer'];


    public function users()
    {
        // return $this->hasMany(User::class);
        return $this->belongsToMany(User::class);
    }

    public function documents()
    {
        return $this->belongsToMany(Doc::class, 'doc_office');
    }

}
