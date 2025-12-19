<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
            ->scopes(['openid', 'profile', 'email'])
            ->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Email tidak terdaftar');
        }

        $user->update([
            'name'      => $googleUser->name,
            'google_id' => $googleUser->id,
            'avatar'    => $googleUser->avatar, // ✅ SEKARANG PASTI ADA
        ]);

        Auth::login($user);

        return redirect()->route('apps.index');
    }
}
