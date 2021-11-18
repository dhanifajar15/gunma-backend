<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    public function internship(){
        return $this->hasMany(Internship::class);
    }
    public function notification(){
        return $this->hasMany(Notification::class);
    }
}
