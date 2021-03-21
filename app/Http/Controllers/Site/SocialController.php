<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fb_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);
                return redirect()->route('site.home');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('admin@123')
                ]);

                Auth::login($createUser);
                return redirect()->route('site.home');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}