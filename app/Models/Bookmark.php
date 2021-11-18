<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function internship(){
        return $this->belongsToMany(Internship::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
