<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}