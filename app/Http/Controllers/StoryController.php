<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use App\test;



class StoryController extends Controller {


   public function writing($id){

        $story = test::find($id);

     
            
            if($story->permission==1){
                $view=$story->views;
                $view=$view+1;
                $story->views=$view;
                $story->save();
                return view('Pages.story', ['story' => $story]);

            }else{
                if(Auth::guest()){
                    return view('Pages.Layouts.noaccess');

                }elseif(Auth::user()->id==$story->writer_id || Auth::user()->id==15 || Auth::user()->id==29){
                    $view=$story->views;
                    $view=$view+1;
                    $story->views=$view;
                    $story->save();
                    return view('Pages.story', ['story' => $story]);
    
                }else{
                    return view('Pages.Layouts.noaccess');
                
            }   
        }        
    }  
}
