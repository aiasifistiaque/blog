<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\test;



class EditController extends Controller {
   public function index($id){

      $story = test::where('id',$id)->get();
                    
      return view('Pages.editPost', ['story' => $story]);
   }
}