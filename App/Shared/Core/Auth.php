<?php

namespace App\Shared\Core;

use App\User\Domain\Entity\User;

class Auth
{
    public static function login(User $user): void
    {
        // Prevent session fixation attack
        session_regenerate_id(true);

        $_SESSION['user'] = [

            'id' => $user->getId(),

            'name' => $user->getName(),

            'email' => $user->getEmail(),

            'role_id' => $user->getRoleId()

        ];
    }

    public static function logout(): void
    {
        unset($_SESSION['user']);
    }


    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }


    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }


    public static function id(): ?int
    {
        return $_SESSION['user']['id'] ?? null;
    }


    public static function roleId(): ?int
    {
        return $_SESSION['user']['role_id'] ?? null;
    }

}