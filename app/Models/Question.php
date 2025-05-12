<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
