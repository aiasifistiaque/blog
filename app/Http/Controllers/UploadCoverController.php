<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadCoverCOntroller extends Controller {
   public function index($id){
        return view('Pages.uploadfile',['id' => $id]);
   }
   
   public function upload(Request $request){
    
      $file = $request->file('image');     
      $title = $request->input('title');
      $body = $request->input('body');
      // $file->move($destinationPath,$request->user()->id.'.jpg');
      $filenametostore='images/post/cover/post_'.$request->user()->id.'.jpg';

      Storage::disk('s3')->put($filenametostore, file_get_contents($file), 'public');
      $imagename = Storage::url($filenametostore);

      return redirect()->route('Pages.write',['body'=>$body,'title'=>$title]);
    
      //  return redirect()->action('Auth\Profile@profile', ['imagename', $imagename]);
   }
}