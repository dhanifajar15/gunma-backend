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
    public function getLocation ($name){
        // $location = Location::all()->firstWhere('locationName',$name);
        $location = Location::where('locationName',$name)->get();
        if ( empty($location)){
            return $location->id;
        }
        else {
            $locationNew = new Location;
            $locationNew->locationName = $name;
            $locationNew->save();
            return $locationNew->id;
        }
        

    }

}
