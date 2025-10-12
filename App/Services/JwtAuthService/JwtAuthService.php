<?php

namespace App\Services\JwtAuthService;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;
use System\Responses\JsonResponse;

class JwtAuthService
{
    private static string $secret;
    private static function getSecret(): string
    {
        if (!isset(self::$secret)) {
            self::$secret = $_ENV['JWT_SECRET'] ?? 'default-secret-fallback';
        }
        return self::$secret;
    }

    /**
     * Decode the token
     * @param $token|string $token
     */
    public static function validateToken($token)
    {
        try {
            return JWT::decode($token, new Key(self::getSecret(), 'HS256'));
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Get the bearer token
     * @return string|null
     */
    public static function getBearerToken(): ?string
    {
        $auth = null;

        if (function_exists('getallheaders')) {
            $headers = getallheaders();
            foreach (['Authorization', 'authorization'] as $k) {
                if (!empty($headers[$k])) {
                    $auth = $headers[$k];
                    break;
                }
            }
        }

        $auth = $auth
            ?? ($_SERVER['HTTP_AUTHORIZATION'] ?? null)
            ?? ($_SERVER['Authorization'] ?? null)
            ?? ($_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? null);

        if ($auth && preg_match('/Bearer\s+(\S+)/i', $auth, $m)) {
            return $m[1];
        }

        return null;
    }

    /**
     * Get the authenticated user
     * @return \stdClass|null
     */
    public static function authenticatedUser()
    {
        $token = self::getBearerToken();
        return $token ? self::validateToken($token) : null;
    }

    /**
     * Abort if not authenticated
     * @param string $message
     * @return void
     */
    public static function abortIfNotAuthenticated(string $message): void
    {
        if (!self::authenticatedUser()) {
            JsonResponse::unauthorized($message);
            exit;
        }
    }
}
