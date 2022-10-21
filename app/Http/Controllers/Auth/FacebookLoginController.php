<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookLoginController extends Controller
{

    public function login(){
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
       $user= Socialite::driver('facebook')->user();
       try {

        $user = Socialite::driver('facebook')->user();

        dd($user);
        $userExisted = User::where('oauth_id', $user->id)->where('oauth_type', 'facebook')->first();
        dd($userExisted);
        dd('Nombre=' . $user->name,
        'Email=' . $user->email,
        'id='. $user->id,
        'completo=',$user);


        if( $userExisted ) {
            Auth::login($userExisted);
            return redirect()->route('dashboard');
        }else {
            $newUser = User::create([
                'name'      => $user->name,
                'email'     => $user->email,
                'nickname'  => substr(trim($user->name),1,15),
                'oauth_id'  => $user->id,
                'oauth_type'=> static::DRIVER_TYPE,
                'password'  => Hash::make($user->id)
            ]);
            Auth::login($newUser);
            return redirect()->route('dashboard');
        }
    } catch (\Exception $e) {
        dd($e);
    }
}


    public function handleGoogleCallback()
    {
        // handleGoogleCallback
        try {

            $user = Socialite::driver('facebook')->user();

            $userExisted = User::where('oauth_id', $user->id)->where('oauth_type', static::DRIVER_TYPE)->first();

            if( $userExisted ) {

                Auth::login($userExisted);

                return redirect()->route('dashboard');

            }else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'nickname' => substr(trim($user->name),1,15),
                    'oauth_id' => $user->id,
                    'oauth_type' => static::DRIVER_TYPE,
                    'password' => Hash::make($user->id)
                ]);


                Auth::login($newUser);

                return redirect()->route('dashboard');
            }


        } catch (\Exception $e) {
            dd($e);
        }

    }

}
