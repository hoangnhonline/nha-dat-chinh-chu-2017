<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Socials;
use App\Models\Users;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function login($provider)
    {
        $providerKey = config('services.' . $provider);

        if (empty($providerKey)) {
            return abort(404);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handle(Request $request, $provider)
    {
        if ($request->denied != '') {
            return redirect(route('home'));
        }

        $user = Socialite::driver($provider)->user();
        $socialUser = null;

        //get model
        $modelUsers = new Users();
        $modelSocials = new Socials();

        //check user exists
        $userCheck = $modelUsers->findByAttributes([
            'email' => $user->email,
            'type' => 'member'
        ]);

        if ($userCheck) {
            $socialUser = $userCheck;
        } else {
            //There is no combination of this social id and provider, so create new one
            $newUser = $modelUsers->create([
                'email' => $user->email,
                'full_name' => $user->name,
                'password' => bcrypt('Aa@123456'),
                'group_id' => config('nhadat.default_group_member'),
                'type' => 'member',
                'status' => 1
            ]);

            $socialUser = $newUser;
        }

        $modelSocials->updateOrCreate([
            'user_id' => $socialUser->id,
            'social_id' => $user->id,
            'provider' => $provider
        ], [
            'user_id' => $socialUser->id,
            'social_id' => $user->id,
            'provider' => $provider
        ]);

        auth('web')->login($socialUser, true);

        return redirect(route('member.detail'));
    }
}
