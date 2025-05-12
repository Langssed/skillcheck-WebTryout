<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subjects(){
        return $this->hasMany(Subject::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
}
