<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleController extends Controller
{
    public function googlePage(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack(): RedirectResponse
    {
        /** @var User $googleUser */
        $googleUser = Socialite::driver('google')->user();

        /** @var User|null $user */
        $user = User::query()->where('email', $googleUser->email)->first();

        if (! $user) {
            return redirect()
                ->route('login')
                ->with('error', 'Please use your official email not your personal email');
        }
        Auth::login($user);

        return redirect()
            ->route('google-callback')
            ->with([
                'isPaid' => $user->activePayment() !== null,
                'passengerName' => $user->name,
                'serviceName' => $user->activePayment()?->service_name,
                'validFrom' => $user->activePayment()?->valid_from,
                'validUntil' => $user->activePayment()?->valid_until,
                'paymentReference' => $user->activePayment()?->payment_reference,
            ]);
    }
}
