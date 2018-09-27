<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\test;
use DB;

class PostApproval extends Controller
{
    public function index(){
        return view('Pages.approve');
    }

    public function approve(Request $request){
        $id= $request -> id;
        $story = test::find($id);
        $story -> permission = 1;
        $story -> save();
        return redirect (url('/approvewithoutajax'));
    }
    
    public function reject(Request $request){
        $id= $request -> id;
        $story = test::find($id);
        $story -> permission = 2;
        $story -> save();
        return redirect (url('/rejectwithoutajax'));
    }

    public function delete($id){
        
        $story = test::find($id);
        $story->delete();
        return redirect (url('/deletewithoutajax'));
    }
}
