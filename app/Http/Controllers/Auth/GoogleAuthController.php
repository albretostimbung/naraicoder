<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
            ]
        );

        // assign default role
        if (!$user->hasAnyRole()) {
            $user->assignRole('user');
        }

        auth()->login($user);

        if ($user->hasRole('admin')) {
            return redirect('/admin');
        }

        return redirect('/'); // nanti ke halaman event
    }
}
