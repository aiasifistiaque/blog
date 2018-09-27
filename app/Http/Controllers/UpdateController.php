<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\test;

class UpdateController extends Controller {
   
	
  
    public function editpost(Request $request,$id){
        
            $title = $request->input('title');
            $body = $request->input('body');
            $writer=Auth::user()->name;
            $writer_id=Auth::user()->id;

            $post=test::find($id);
            $post->title=$title;
            $post->body=$body;
            $post->save();
        
            return redirect(url('/story/'.$id));
    }
}