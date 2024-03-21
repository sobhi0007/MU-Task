<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use App\Enums\SocialNetworksEnum;
class SocialLoginController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function  redirectToSocial($social): RedirectResponse
    {
        if(!SocialNetworksEnum::isExist($social)) return abort(404);
        return Socialite::driver($social)->redirect();
    }

    /**
     * @return RedirectResponse
     */
    public function handleSocialCallback($social): RedirectResponse
    {
        if(SocialNetworksEnum::isExist($social)){

            $user = Socialite::driver($social)->user();

            $existingUser = User::when($social == 'facebook', function ($query) use ($user) {
                return $query->where('social_id', $user->id);
            })->when($social == 'google', function ($query) use ($user) {
                return $query->where('email', $user->email);
            })->first();
        
            if ($existingUser) {
               Auth::guard('web')->login($existingUser);
            } else {
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->social_id = $user->id;
                $newUser->social_network = $social;
                $newUser->password = bcrypt(request(Str::random()));
                $newUser->save();
                
               Auth::guard('web')->login($newUser);
            }

            return redirect()->route('home');
        }
        return abort(404);
    }



}