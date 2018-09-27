<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\UserProfile;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests;
use Auth;
use App\test;
use App\coverphoto;
use Illuminate\Support\Facades\Storage;

class Profile extends Controller
{
    public function profile(){
        
            if (Auth::guest()){
                return view('Pages.Layouts.noaccess');

            }else{
                
                $id= Auth::user()->id;
                $url='no image';

                $profile = UserProfile::where('id',$id)
                           ->get();

                $story = test::where('writer_id',$id)
                                    ->orderBy('poster','desc')
                                    ->get();

                $accepted_posts=test::where('writer_id',$id)
                                    ->where('permission',1)
                                    ->orderBy('poster','desc')
                                    ->get();

                $rejected_posts=test::where('writer_id',$id)
                                    ->where('permission',2)
                                    ->orderBy('poster','desc'
                                    )->get();

                $pending_posts=test::where('writer_id',$id)
                                    ->where('permission',0)
                                    ->orderBy('poster','desc')
                                    ->get();

                $filename='cover_'.$id.'.jpg';                    
                     
                $filenametostore='images/coverphotos/cover_'.$id.'.jpg';
                $imagename = Storage::url($filenametostore);
                       
                $query= coverphoto::where('userid',$id)
                            ->latest()                           
                            ->first();

                if ($query!=null){                            
                    $url= $query->url;  

                }else{
                    $url="/uploads/cover.jpg";
                }

                return view('Pages.dashboard', [ 
                    'profile'=>$profile,
                    'story'=>$story,
                    'imagename'=>$url,
                    'accepted_posts'=>$accepted_posts,
                    'rejected_posts'=>$rejected_posts,
                    'pending_posts'=>$pending_posts
                   ]);                        
            }       
    }
    
    /* edit user name */
    public function editname(Request $request){
        $name=$request->name;
        $id=$request->id;
        $user=UserProfile::find($id);
        $user->name=$name;
        $user->save();
        $profile=UserProfile::select('id','name','email','created_at')->where('id',$id)->get();
        return response()->json(['data'=>$profile]);
    }
    /* END of edit user name */

    /* edit user email */
    public function editemail(Request $request){
        $email=$request->email;
        $id=$request->id;
        $user=UserProfile::find($id);
        $user->email=$email;
        $user->save();
        $profile=UserProfile::select('id','name','email','created_at')->where('id',$id)->get();
        return response()->json(['data'=>$profile]);
    }
    /* END of edit user email */


    public function userprofile(Request $request){
        
            $id=$request->id;
            $url='no image';
            $filename='cover_'.$id.'.jpg';                    
                 
            $filenametostore='images/coverphotos/cover_'.$id.'.jpg';
            $imagename = Storage::url($filenametostore);

            $profile = UserProfile::where('id',$id)
                       ->get();
                   
            $query= coverphoto::where('userid',$id)
                        ->latest()                           
                        ->first();

            $profilePicturQeuery = UserProfile::find($id)->profilePicture;
            echo $profilePicturQeuery;

            if ($query!=null){                            
                $url= $query->url;  

            }else{
                $url="/uploads/cover.jpg";
            }

            if ($profilePicturQeuery!=null){                            
                $prfilePicture= $profilePicturQeuery->url;  

            }else{
                $prfilePicture="/uploads/cover.jpg";
            }
        
        

        return response()->json([
                        'data'=>$profile,
                        'cover'=>$url,
                        'profilepicture'=>$prfilePicture
        ]);                               
    }
    
    public function showprofile(){
        return view('Users.Profile');
    }


    /* display all user profiles */

    public function getProfile(){
          
        $profile = UserProfile::select('name','email','created_at')->where('id',29)
                       ->get();
        $profile=UserProfile::select('id','name','email','created_at')->get();
        return response()->json(['data'=>$profile]);
    }

    /* deletes an user */

    public function deleteprofile($id){

        UserProfile::destroy($id);
        return response()->json([
            'success' => true
        ]);
    }

    public function allusers(){
        $users=UserProfile::all();
        return response()->json(['data'=>$users]);
    }
}
