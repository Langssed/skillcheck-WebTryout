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

    public function scopeFilter($query, $search){
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('level', function($q2) use ($search){
                    $q2->where('name', 'like', '%' . $search . '%');
                });
            });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}