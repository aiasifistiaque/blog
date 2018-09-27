<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\coverphoto;
use DB;
use Auth;
use App\test;

class AjaxCoverPostController extends Controller {
    public function index(){
        return redirect()->route('profile');

    }
    public function upload(Request $request)
    {
            $extension = $request->file('image')->getClientOriginalExtension();
            $dir = 'uploads/';
            $filename = uniqid() . '_' . time();
            $file = $request -> file('image');
            
            $userid= Auth::user()->id;

            $path='images/coverphotos/cover_'.$filename.'1.jpg';

            $tag='profilecover';
            
            Storage::put($path, file_get_contents($file), 'public');
            $imagename = Storage::url($path);
            $cov=new coverphoto;
            $cov->url=$imagename;
            $cov->userid=$userid;
            $cov->tag=$tag;
            $cov->save();
            
            //DB::insert('insert into profilecoverphoto (tag, userid, url) values(?,?,?)',[$tag, $userid, $imagename]);
            return response()->json(array('src'=> $imagename), 200);
        
    }

    

}
