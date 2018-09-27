<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\UserProfile;
use App\test;
use Auth;
use App\Dummyform;
use Illuminate\Support\Facades\Storage;

class Dummy extends Controller
{
    public function savedata(Request $request){

        $extension = $request->file('image')->getClientOriginalExtension();
        $file = $request->file('image');
        $filename = uniqid() . '_' . time();
        $path='images/coverphotos/cover_'.$filename.'1.jpg';
        Storage::put($path, file_get_contents($file), 'public');
        $imagename = Storage::url($path);

        $dummy = new Dummyform;
        $dummy->name = $request->name;
        $dummy->url = $imagename;
        $dummy->save();

        return response()->json(['data'=>$dummy]);
    }

    public function imageupload(Request $request){

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = uniqid() . '_' . time();
        $file = $request -> file('image');
        $path='images/coverphotos/cover_'.$filename.'1.jpg';
        Storage::put($path, file_get_contents($file), 'public');
        $imagename = Storage::url($path);

    }
}
