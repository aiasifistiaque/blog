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
    
     $file = $request->file('image');
  // $file->move($destinationPath,$request->user()->id.'.jpg');
      $filenametostore='images/coverphotos/cover_'.$request->user()->id.'.jpg';

      Storage::disk('s3')->put($filenametostore, file_get_contents($file), 'public');
      $imagename = Storage::url($filenametostore);
    
      return redirect()->action('Auth\Profile@profile', ['imagename', $imagename]);
   }
}