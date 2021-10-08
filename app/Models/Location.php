<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [
        'locationName',

    ];

    public function internship(){
        return $this->hasMany(Internship::class);
    }
}
