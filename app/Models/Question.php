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

    public function scopeFilter($query, $search){
        return $query->where(function ($q) use ($search) {
            $q->where('content', 'like', '%' . $search . '%')
                ->orWhereHas('category', function($q2) use ($search){
                    $q2->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('subject', function($q3) use ($search){
                    $q3->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('level', function($q3) use ($search){
                    $q3->where('name', 'like', '%' . $search . '%');
                });
        });
    }
}
