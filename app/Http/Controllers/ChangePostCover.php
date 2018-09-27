<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use App\test;

class ChangePostCover extends Controller {
  
   public function index($id){

      return view('Pages.uploadpostcover',['id'=>$id]);
   }

   public function upload(Request $request,$id){

    $this->validate($request, [
                   'image' => 'mimes:jpeg,bmp,png',      //only allow this type extension file.
                    ]);
    
     $file = $request->file('image');
     $extension='jpg';
     //$extension = $request->file('image')->getClientOriginalExtension();

     $story = test::where('id',$id)
                   ->get();
                   
     $writer_id= Auth::user()->id;
     //$t = $story->writer_id ;
    
      $filenametostore='images/posts/postcover_'.$writer_id.'_'.$id.'.'.$extension;
      Storage::disk('s3')->put($filenametostore, file_get_contents($file), 'public');

      $imagename = Storage::url($filenametostore);
    
      DB::update('update laravelarticle set cover = ? where id = ?' , [$imagename,$id]);
     
      return redirect(url('story/'.$id));

      
    
    //  return redirect()->action('Auth\Profile@profile', ['imagename', $imagename]);
   }
}