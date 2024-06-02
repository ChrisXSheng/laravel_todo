<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class OTPController extends Controller
{
    public function showOtpSetup()
    {
        $google2fa = app('pragmarx.google2fa');
        $user = Auth::user();
        $secret = $google2fa->generateSecretKey();
        $qrUrl = $google2fa->getQRCodeUrl(config('app.name'), $user->email, $secret);

        return view('otp.setup', ['qrUrl' => $qrUrl, 'secret' => $secret]);
    }

    public function storeOtpSetup(Request $request)
    {
        $user = Auth::user();
        $user->google2fa_secret = $request->input('secret');
        $user->save();

        return redirect()->route('dashboard');
    }
}
