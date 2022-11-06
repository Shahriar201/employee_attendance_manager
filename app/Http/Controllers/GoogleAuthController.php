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
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->id)->first();


            if (!$user) {

                $new_user = User::create([
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'google_id' => $google_user->id
                ]);

                Auth::login($new_user);

                return redirect('/home');

            } else {
                Auth::login($user);

                return redirect('/home');
            }
        }

        catch (\Throwable $th) {
            dd('Something went wrong!'. $th->getMessage());
        }
    }
}
