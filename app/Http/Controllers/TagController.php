<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index (){
        $tag = Tag::orderBy('id','DESC')->get();

    }

    public function show ($id){
        $tag = Tag::findOrFail($id);

    }
    public function getTag ($name){
        // $tag = Tag::all()->firstWhere('locationName',$name);
        $tag = Tag::where('tagName',$name)->get();
        if ( empty($tag)){
            return $tag->id;
        }
        else {
            $tagNew = new Tag;
            $tagNew->tagName = $name;
            $tagNew->save();
            return $tagNew->id;
        }
        

    }

    //
}
