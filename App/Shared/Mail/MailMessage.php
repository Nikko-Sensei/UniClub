<?php

namespace App\Shared\Mail;

final class MailMessage
{
    public function __construct(
        public readonly string $to,
        public readonly string $subject,
        public readonly string $body
    ) {}
}
