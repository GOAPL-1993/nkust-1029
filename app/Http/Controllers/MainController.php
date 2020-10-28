<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $guser = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'email' => $guser->email
        ], [
                'name' => $guser->name,
                'password' => Hash::make('password', ['rounds' => 12,])
        ]);

        Auth::login($user, true);

        return redirect("/");
    }

    public function index() {
        return view("index");
    }

    public function logout() {
        Auth::logout();
        return redirect("/");
    }
    
    public function member() {
        $email = Auth::user()->email;
        return $email;
    }
}
