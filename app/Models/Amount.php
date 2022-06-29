<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    use HasFactory;

    public $timestamps = false;


    // Relation
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Amount()
    {
        return $this->hasOne(Category::class);
    }
}
