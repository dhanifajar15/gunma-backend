<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Internship extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];




    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

    public function bookmark(){
        return $this->hasMany(Tag::class);
    }
    //bookmark dan intern masih bingung
}
