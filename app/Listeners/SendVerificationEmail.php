<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\VerifikasiEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class SendVerificationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event)
    {
        /** @var User $user */
        $user = $event->user;

        // Generate verification token
        $token = sha1(time());

        // Simpan token ke database atau gunakan metode lain untuk mengaitkannya dengan user
        $user->email_verification_token = $token;
        $user->save();

        // Kirim email verifikasi
        $verificationUrl = url('/verify-email?token=' . $token);
        Mail::to($user->email)->send(new VerifikasiEmail($user->name, $verificationUrl));
    }
}
