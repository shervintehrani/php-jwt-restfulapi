<?php
require 'vendor/autoload.php';
use Firebase\JWT\JWT;

$key = "bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew="; // replace with your secret key
echo "<br />SERVER['HTTP_AUTHORIZATION']: ".$_SERVER['HTTP_AUTHORIZATION'].'<br />';
// Get the Bearer token from the 'Authorization' header
if (isset($_SERVER['HTTP_AUTHORIZATION']) && preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {
    $jwt = $matches[1];

    try {
        // Decode the JWT token
        $payload = JWT::decode($jwt, $key, array('HS256'));

        // If the token is valid, you can use the payload
        // For example, you can check if the 'aud' claim matches your site
        if ($payload->aud === 'https://www.google.com') {
            // The token is valid, continue with your private page logic
        } else {
            // The 'aud' claim does not match, handle the error
            echo 'Invalid token';
        }
    } catch (Firebase\JWT\ExpiredException $e) {
        // The token is expired, handle the error
        echo 'Expired token';
    } catch (Exception $e) {
        // The token is invalid, handle the error
        echo 'Invalid token';
    }
} else {
    // No token was provided, handle the error
    echo 'No token provided';
}

function validateToken($token, $key)
{
    try {
        // Decode the token using the secret key
        $decodedPayload = JWT::decode($token, $key, ['HS256']);
        return $decodedPayload;
    } catch (Firebase\JWT\ExpiredException $e) {
        return "Token has expired.";
    } catch (Firebase\JWT\SignatureInvalidException $e) {
        return "Invalid token.";
    } catch (Firebase\JWT\BeforeValidException $e) {
        return "invalid token now, may be valid in future.";
    }
}



// Example usage

