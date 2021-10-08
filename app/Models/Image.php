<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [
        'filePath',
    ];


    public function user(){
        return $this->hasOne(User::class);
    }
    public function internship(){
        return $this->hasOne(Internship::class);
    }
}
