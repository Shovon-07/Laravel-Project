<?php
namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JWTHelper
{
    public static function createToken($email): string
    {
        $key = env('JWT_key');
        $payload = [
            'iss' => env('APP_NAME'),
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'userEmail' => $email,
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function CreateTokenForPassReset($email): string
    {
        $key = env('JWT_key');
        $payload = [
            'iss' => env('APP_NAME'),
            'iat' => time(),
            'exp' => time() + 60 * 5,
            'userEmail' => $email,
        ];
        return JWT::encode($payload, $key, 'HS256');

    }

    public static function verifyToken($token): string
    {
        try {
            $key = env('JWT_Key');
            $decode = JWT::decode($token, new Key($key, 'HS256'));
            return $decode->userEmail;

        } catch (Exception $e) {
            return 'Unauthorized';
        }
    }
}