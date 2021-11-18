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


    //
}
