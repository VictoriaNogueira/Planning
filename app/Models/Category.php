<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;


    // Relation
    public function Amount()
    {
        return $this->belongsToMany(Amount::class);
    }

}
