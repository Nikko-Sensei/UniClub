<?php

namespace App\Shared\Security;

class Csrf
{
    public function token(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }

    public function hiddenField(): string
    {
        return '<input type="hidden" name="csrf_token" value="'
            . htmlspecialchars($this->token(), ENT_QUOTES, 'UTF-8')
            . '">';
    }

    public function verify(string $token): bool
    {
        return isset($_SESSION['csrf_token'])
            && hash_equals($_SESSION['csrf_token'], $token);
    }
}