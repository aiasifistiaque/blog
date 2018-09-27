<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserProfile;
use App\test;

class viewController extends Controller {
   public function index(){

        $users = test::all();
        $stories = test::where('permission',1)
                    ->orderBy('poster','desc')->get();
        $storiestwo=test::where('permission',1)
                    ->orderBy('poster','asc')->paginate(5);
        
        return view('Pages.indexThree', ['users' => $storiestwo,'stories'=> $stories]);
   }
}