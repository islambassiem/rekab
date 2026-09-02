<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\View\View;

class QrCodeController extends Controller
{
    public function verify(string $uuid): View
    {
        $payment = Payment::query()
            ->with('user')
            ->where('payment_reference', $uuid)
            ->where('valid_until', '>=', now()->startOf('day'))
            ->first();

        return view('rekab.verify', [
            'payment' => $payment,
            'isPaid' => $payment !== null,
        ]);
    }
}
