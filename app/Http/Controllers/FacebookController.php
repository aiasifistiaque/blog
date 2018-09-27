<?php


namespace App\Http\Controllers\Auth;


use Socialite;



class FacebookController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        
            $user = Socialite::driver('facebook')->user();

             
    }
}