<?php


namespace App\Http\Controllers\Auth;


use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;


class FacebookController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleProviderCallback()

    {
        $redirectTo = '/';
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user, 'facebook');
        Auth::login($authUser, true);
        return redirect(url('/profile'));
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider_id' => $user->id,
            'provider' => $provider
            
        ]);
    }
}