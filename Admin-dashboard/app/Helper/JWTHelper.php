<?php
namespace App\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JWTHelper
{
    public static function generateToken($userEmail, $userId)
    {
        $key = "123-xyz-abc-321";
        $payload = [
            "iss" => "Admin",
            "iat" => time(),
            "exp" => time() + 60 * 60,
            "userEmail" => $userEmail,
            "userId" => $userId
        ];

        return JWT::encode($payload, $key, "HS256");
    }

    public static function decodeToken($token)
    {
        try {
            if ($token == null) {
                return "Unauthorized";
            } else {
                $key = "123-xyz-abc-321";
                return JWT::decode($token, new Key($key, 'HS256'));
            }
        } catch (Exception $exception) {
            return "Unauthorized";
        }
    }
}