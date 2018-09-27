<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\test;

class InsertController extends Controller {
   
	
   public function insert(Request $request){
      $firstname = $request->input('firstname');
      $lastname = $request->input('lastname');
      $email = $request->input('email');
      $password = $request->input('password');
      $provider='app';
      DB::insert('insert into laravelone (firstname,lastname,email,provider,password) values(?,?,?,?,?)',[$firstname,$lastname,$email,$provider,$password]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/insert">Click Here</a> to go back.';
   }

   public function insertpost(Request $request){

    $test = new test;
    $test -> title = $request -> input('title');
    $test -> body = $request->input('body');
    $test -> writer = Auth::user()->name;
    $test -> writer_id = Auth::user()->id;
    $test -> catagory = $request ->input('catagory');

    //$title = $request->input('title');
    //$body = $request->input('body');
    //$catagory = $request->input('catagory');
    //$writer=Auth::user()->name;
    //$writer_id=Auth::user()->id;

    $unique = uniqid() . '_' . time();

    $file = $request->file('image');
    $filenametostore='images/posts/postcover_'.$request->user()->id.'_'.$unique.'.jpg';
    Storage::disk('s3')->put($filenametostore, file_get_contents($file), 'public');
    $imagename = Storage::url($filenametostore);
    
    $test -> cover = $imagename;
    $test->save();
   
    //DB::insert('insert into laravelarticle (title, cover, writer,catagory, body,writer_id) values(?,?,?,?,?,?)',[$title,$imagename,$writer,$catagory,$body,$writer_id]);
    
    return redirect(url('/profile'));
 }
    public function editpost(Request $request,$id){

    $title = $request->input('title');
    $body = $request->input('body');   
    $writer=Auth::user()->name;
    $writer_id=Auth::user()->id;
   
    DB::update('update laravelarticle set title = ?, body = ? where id = ?' , [$title,$body,$id]);

    echo "Record edited successfully into database.<br/>";
    echo '<a href = "/write">Click Here</a> to go back.';
 }
}