<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use LaravelQRCode\Facades\QRCode;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleController extends Controller
{
    public function googlePage(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallBack(): RedirectResponse
    {
        /** @var \Laravel\Socialite\Two\User $googleUser */
        $googleUser = Socialite::driver('google')->user();

        /** @var User|null $user */
        $user = User::query()->where('email', $googleUser->email)->first();

        if (! $user) {
            return redirect()->route('login')->with('error', 'Please use your official email not your personal email');
        }
        Auth::login($user);
        $payment = $user->activePayment();

        if (! $payment) {
            return redirect()->route('login')->with(
                'error',
                'You do not have an active payment. Please contact the finance department to activate your payment.'
            );
        }

        $path = public_path()."/{$payment->payment_reference}.png";
        $filename = "{$payment->payment_reference}.png";
        QRCode::text(route('verify', ['uuid' => $payment->payment_reference]))
            ->setOutfile($path)
            ->png();

        return redirect()->route('authenticated', [
            'passengerName' => $user->name,
            'serviceName' => $payment->service_name,
            'validFrom' => $payment->valid_from,
            'validUntil' => $payment->valid_until,
            'paymentReference' => $payment->payment_reference,
            'filename' => $filename,
        ]);
    }

    public function authenticated(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $payment = $user->activePayment();

        $data = [
            'isPaid' => $payment !== null,
            'passengerName' => $user->name,
            'serviceName' => $payment?->service_name,
            'validFrom' => $payment?->valid_from,
            'validUntil' => $payment?->valid_until,
            'paymentReference' => $payment?->payment_reference,
        ];

        if ($payment) {
            $filename = "{$payment->payment_reference}.png";
            $path = storage_path("app/public/{$filename}");

            QRCode::text(route('verify', [
                'uuid' => $payment->payment_reference
            ]))
                ->setOutfile($path)
                ->png();

            $data['filename'] = Storage::url($filename);
        }

        return view('rekab.authenticated', $data);
    }
}
