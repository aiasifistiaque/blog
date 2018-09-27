<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\test;

class Catagory extends Controller
{
    public function catagory($catagory){

        $users=test::where('catagory',$catagory)
                    ->get();
        return view('Pages.home',['users'=>$users]);

    }

    public function catagory_page($catagory){

        $users=test::where('catagory',$catagory)
                     ->where('permission',1)
                     ->orderBy('poster','desc')
                     ->get();

        return view('Pages.catagory',['users'=>$users,'catagory'=>$catagory]);

    }
    
}
