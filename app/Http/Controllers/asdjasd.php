<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller {

   public function index(){

      return view('Pages.uploadfile');
   }

   public function showUploadFile(Request $request){
    //$path = $request->file('image')->store('storage\image\cover_'.$request->user()->id);

      $file = $request->file('image');  
      $filenametostore='anewfile.jpg';
      $extension='.jpg';
      $extension = $request->file('image')->getClientOriginalExtension();
      $filenametostore='cover_'.$request->user()->id.$extension;

      Storage::disk('s3')->put($filenametostore, file_get_contents($file), 'public');
      $imageName = Storage::disk('s3')->url($filenametostore);
      echo $imagename;

      //Storage::disk('s3')->put('avatars/1', $fileContents);
   }
}