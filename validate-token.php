<?php
header('Content-Type: application/json');
//declare(strict_types=1);
require 'vendor/autoload.php'; // Include php-jwt library
use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;

function validateToken(string $token, string $secretKey): array
{
    try {
        $decoded = JWT::decode($token, $secretKey, ['HS256']);
        return [
            'valid' => true,
            'payload' => $decoded,
            'message' => 'Token is valid.'
        ];
    } catch (ExpiredException $e) {
        return ['valid' => false, 'message' => 'Token has expired.'];
    } catch (SignatureInvalidException $e) {
        return ['valid' => false, 'message' => 'Invalid token signature.'];
    } catch (BeforeValidException $e) {
        return ['valid' => false, 'message' => 'Token not valid yet.'];
    } catch (Exception $e) {
        return ['valid' => false, 'message' => 'Token error: ' . $e->getMessage()];
    }
}


