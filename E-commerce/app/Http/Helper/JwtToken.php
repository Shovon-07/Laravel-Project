<?php
namespace App\Http\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtToken
{
  public static function CreateAuthToken($id, $email): string
  {
    $key = env('JWT_KEY');
    $payload = [
      'iss' => env('APP_URL') . "/" . env('APP_NAME'),
      'iat' => time(),
      'exp' => time() + 60 * 60,
      // time() + second * minute * hour * day
      'userId' => $id,
      'userEmail' => $email
    ];
    return JWT::encode($payload, $key, 'HS256');
  }

  public static function DecodeToken($token)
  {
    try {
      if ($token != null) {
        $key = env('JWT_KEY');
        $data = JWT::decode($token, new Key($key, 'HS256'));
        return $data;
      } else {
        return 'Unauthorized';
      }
    } catch (Exception $e) {
      return 'Unauthorized';
    }
  }
}