<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
     use HasFactory;
    protected $guarded = ['id'];

    public function Subject(){
        return $this->belongsTo(Subject::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
