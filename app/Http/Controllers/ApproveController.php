<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserProfile;
use Auth;

use App\test;

class ApproveController extends Controller
{   
    
    function index(){
        if(Auth::guest()){
            return view('Pages.Layouts.noaccess');

        }else{
            if(Auth::user()->id==15 || Auth::user()->id==29){
                $stories = test::where('permission','<',3)->orderBy('poster','desc')->get();
                $approved = test::where('permission',1)->orderBy('poster','desc')->get();
                $rejected= test::where('permission',2)->orderBy('poster','desc')->get();
                $pending= test::where('permission',0)->orderBy('poster','desc')->get();

                return view('Pages.approve',[
                                            'stories'=>$stories,
                                            'approved'=>$approved,
                                            'rejected'=>$rejected,
                                            'pending'=>$pending
                                            ]);
           }else{
        return view('Pages.Layouts.noaccess');
  
    }
    }
}
}
