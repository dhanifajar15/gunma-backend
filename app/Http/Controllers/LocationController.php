<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index (){
        $location = Location::orderBy('id','DESC')->get();

    }

    public function show ($id){
        $location = Location::findOrFail($id);

    }





}
