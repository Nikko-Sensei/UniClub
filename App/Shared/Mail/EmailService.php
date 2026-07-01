<?php

namespace App\Shared\Mail;


class EmailService
{

    private Mailer $mailer;


    public function __construct(
        Mailer $mailer
    )
    {
        $this->mailer = $mailer;
    }

    public function sendOtp(string $email, string $otp): bool
{
    $body = "
        <h2>UniClub Password Reset OTP</h2>
        <p>Your OTP code is:</p>

        <h1 style='letter-spacing:5px;'>
            {$otp}
        </h1>

        <p>This code expires in 10 minutes.</p>
    ";

    return $this->mailer->send(
        $email,
        "Your OTP Code",
        $body
    );
}

}