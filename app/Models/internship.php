<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class internship extends Model
{
    use HasFactory;
    protected $fillable = ['namaProgram',
    'lokasi',
    'deskripsi',
    'tag',
    'durasi',
    'status',
    'benefit',
    'requirement',
    'linkRegistrasi',
    'closeRegistrasi'];
}
