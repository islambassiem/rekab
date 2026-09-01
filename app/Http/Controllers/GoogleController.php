<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleController extends Controller
{
    public function googlePage(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack(): View
    {
        /** @var \Laravel\Socialite\Two\User $googleUser */
        $googleUser = Socialite::driver('google')->user();

        /** @var User|null $user */
        $user = User::query()->where('email', $googleUser->email)->first();

        if (! $user) {
            return view('rekab.login')->with('error', 'Please use your official email not your personal email');
        }
        Auth::login($user);
        $payment = $user->activePayment();

        return view('rekab.authenticated', [
            'isPaid' => $payment !== null,
            'passengerName' => $user->name,
            'serviceName' => $payment?->service_name,
            'validFrom' => $payment?->valid_from,
            'validUntil' => $payment?->valid_until,
            'paymentReference' => $payment?->payment_reference,
        ]);
    }
}
