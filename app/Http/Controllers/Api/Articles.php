<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\UserProfile;
use App\test;
use Auth;

class Articles extends Controller {
   public function index(){

        $articles= test::orderBy('poster','desc')->paginate(5);
        $json_articles= json_encode($articles);
        return response()->json($articles);
   }

   public function story($id){
        $q= test::findOrFail($id)->paginate(1);

        return response()->json([
            'success' => true,
            'data' => $q->toArray()
        ], 400);
   }

   public function dashboardstory($id,$permission,$sort){
       if($sort=="newest"){

           if($permission==4){
                   $q= test::where('writer_id',$id)->orderBy('poster','desc')->get();
           }else{
               
               $q= test::where('permission',$permission)->where('writer_id',$id)->orderBy('poster','desc')->get();
           }
       }else if($sort=="oldest"){

        if($permission==4){
                $q= test::where('writer_id',$id)->orderBy('poster','asc')->get();
        }else{
            
            $q= test::where('permission',$permission)->where('writer_id',$id)->orderBy('poster','asc')->get();
        }
    }else if($sort=="Z-A"){

        if($permission==4){
                $q= test::where('writer_id',$id)->orderBy('title','desc')->get();
        }else{
            
            $q= test::where('permission',$permission)->where('writer_id',$id)->orderBy('title','desc')->get();
        }
    }else if($sort=="A-Z"){

        if($permission==4){
                $q= test::where('writer_id',$id)->orderBy('title','asc')->get();
        }else{
            
            $q= test::where('permission',$permission)->where('writer_id',$id)->orderBy('title','asc')->get();
        }
    }


        return response()->json([
            'success' => true,
            'data' => $q
        ]);
    }



    /* cange permission of an article */
    public function changePermission(Request $request){
        $id=$request->id;
        $article = test::find($id);
        $article->permission=$request->permission;
        $article->save();
        return response()->json($article);
    }
    /* END of change permission of an article */




    public function arp($permission)
    {
        $articles = test::where('permission',$permission)->orderBy('poster','desc')->paginate(15);   
        return response()->json($articles);       
    }




    /* get/sort stories by catagory */
    public function get_stories_by_catagory($catagory,$sort)
    {
        if ($sort=="newest"){

            if ($catagory=="all"){
                $articles = test::orderBy('poster','desc')->get();
            }else{
                $articles = test::where('catagory',$catagory)->orderBy('poster','desc')->get();
            }
        }else if($sort=="oldest"){
            if ($catagory=="all"){
                $articles = test::orderBy('poster','asc')->get();
            }else{
                $articles = test::where('catagory',$catagory)->orderBy('poster','asc')->get();
            }
        }else if($sort=="A-Z"){
            if ($catagory=="all"){
                $articles = test::orderBy('title','asc')->get();
            }else{
                $articles = test::where('catagory',$catagory)->orderBy('title','asc')->get();
            }
        }else if($sort=="Z-A"){
            if ($catagory=="all"){
                $articles = test::orderBy('title','desc')->get();
            }else{
                $articles = test::where('catagory',$catagory)->orderBy('title','desc')->get();
            }
        }
        $catagories = test::select('catagory')->get(); 
        $catagories=$catagories->unique('catagory')->values()->all();  
        return response()->json(['data'=>$articles,'catagories'=>$catagories]);       
    }
    /* END of get/sort stories by catagory */



    public function delete($id)
    {
        $i=(int)$id;
        $responseMsg = "Article not found"; 
        $status = 404;
       
            $del=test::destroy($i);
            
            return response()->json([
                'success' => true
            ]);            
    }



    public function permission(Request $request){
        $article=App\test::find($request->id);
        $article->permission=$request->permission;
        $article->save();
        return response()->json(array('data'=>$article, 200));
    }

    /* this is the left sidebar of home page */
    public function HomeSideBar(){
        $article=test::select('title','cover','poster','catagory','id','permission')
                           ->where('permission',1)
                           ->orderBy('poster','desc')->get();

        return response()->json(array('data'=>$article, 'status'=> 200));
    }
    /* end of home side bar */



    /* get all the views of an user */
    public function totalviews($id){
        $articles=test::select('views','permission')->where('writer_id',$id)->get();
        $count_views=0;
        $article_count=0;
        $dat=array();
        $accepted=$rejected=$pending=0;
        $data=(object)[
            'views'=>'',
            'articlecount'=>'',
            'accepted'=>'',
            'rejected'=>'',
            'pending'=>''
        ];
        foreach ($articles as $article){
            $article_count=$article_count+1;
            $count_views=$count_views + $article->views;

            if ($article->permission==1){
                $accepted=$accepted+1;
            }else if ($article->permission==2){
                $rejected=$rejected+1;
            }else if ($article->permission==0){
                $pending=$pending+1;
            }

        }
        
        $data->views=$count_views;
        $data->articlecount=$article_count;
        $data->accepted=$accepted;
        $data->rejected=$rejected;
        $data->pending=$pending;

        array_push($dat,$data);
        return response()->json(['data'=>$dat]);
    }
    /* end of get all views from user */
}
