<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle() {
        try {
            // retrieve social user info
            $google_user = Socialite::driver('google')->user();

            // retrieve the user from users store
            $user = User::where('google_id', $google_user->id)->first();

            if ($user) {

                Auth::login($user);

                return redirect('/home');

            } else {

                $new_user = new User();
                $new_user->name = $google_user->name;
                $new_user->email = $google_user->email;
                $new_user->google_id = $google_user->id;
                $new_user->save();

                Auth::login($new_user);

                return redirect('/home');
            }
        }

        catch (\Throwable $th) {
            dd('Something went wrong!'. $th->getMessage());
        }
    }
}
