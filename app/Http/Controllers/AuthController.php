<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $email = $googleUser->getEmail();

            if (!$email) {
                Log::error('Email tidak tersedia dari Google');
                return redirect('/login')->with('error', 'Email tidak tersedia.');
            }

            Log::info('Membuat user dengan email: ' . $email);

            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'role' => 0,
                    'nama_user' => $googleUser->getName(),
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(str()->random(24)),
                    'avatar' => $googleUser->getAvatar(),
                ]
            );

            Log::info('User dibuat: ', $user->toArray());

            Auth::login($user, true);
            Log::info(Auth::check() ? '✅ User berhasil login' : '❌ Login gagal');

            return redirect()->intended(route('dashboard'))->with('success', 'Login Google berhasil');
        } catch (\Exception $e) {
            Log::error('❌ Exception: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Gagal login dengan Google');
        }
    }
    public function login(): \Illuminate\Http\RedirectResponse|\Illuminate\View\View
    {
        if (Auth::check()) {
            return redirect()->intended(route('dashboard'));
        }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard', absolute: false))
                ->with('success', 'Login berhasil');
        } catch (AuthenticationException $e) {
            return redirect()->back()
                ->withInput($request->only('name'))
                ->with('error', 'Login gagal');
        }
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil');
    }
}
