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

    public function scopeFilter($query, $search){
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('subject', function($q2) use ($search){
                    $q2->where('name', 'like', '%' . $search . '%');
                });
            });
    }
}
