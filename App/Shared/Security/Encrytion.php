<?php

namespace App\Shared\Security;


class Encryption
{
    private string $key;

    public function __construct()
    {
        $this->key = $_ENV['APP_KEY'];
    }

    public function encrypt(string $data): string
    {

        $iv = random_bytes(
            openssl_cipher_iv_length('AES-256-CBC')
        );

        $encrypted = openssl_encrypt(
            $data,
            'AES-256-CBC',
            $this->key,
            0,
            $iv
        );

        return base64_encode(
            $iv . $encrypted
        );
    }


    public function decrypt(string $data): string
    {
        $data = base64_decode($data);

        $ivLength = openssl_cipher_iv_length(
            'AES-256-CBC'
        );

          $iv = substr(
            $data,
            0,
            $ivLength
        );

        $encrypted = substr(
            $data,
            $ivLength
        );

        return openssl_decrypt(
            $encrypted,
            'AES-256-CBC',
            $this->key,
            0,
            $iv
        );
    }

}