<?php
global $conn;
require_once 'config.php';
// Set the content type to JSON
header('Content-Type: application/json');

require_once 'vendor/autoload.php'; // Include php-jwt library
use Firebase\JWT\JWT;
use Firebase\JWT\Key;




// Your secret key (keep it secure!)
$secretKey = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';

// Generate JWT token
function generateToken($user)
{
    global $secretKey;
    $payload = [
        'user' => $user,
//        'exp' => time() + 3600, // Token expiration (1 hour)
        'exp' => time() + 1200, // Token expiration (20 minutes)
    ];
    return JWT::encode($payload, $secretKey, 'HS256');
}


/**
 * Validate a JWT token.
 *
 * @param string $jwt The JWT token.
 * @param string $secretKey The secret key used to sign the token.
 */

function validateToken(string $token, string $secretKey, $algorithm ) {
    try {
        $decoded = JWT::decode($token, new Key($secretKey, $algorithm));
        return $decoded; // token is valid, return payload
    } catch (\Firebase\JWT\ExpiredException $e) {
        error_log("JWT expired: " . $e->getMessage());
    } catch (\Firebase\JWT\SignatureInvalidException $e) {
        error_log("Invalid signature: " . $e->getMessage());
    } catch (Exception $e) {
        error_log("Invalid token: " . $e->getMessage());
    }

    return false; // token is invalid
}



$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {

    case 'POST':
        $user = $_POST['user'] ?? '';
        $pass = $_POST['pass'] ?? '';

        $stmt = $conn->prepare("SELECT * FROM user WHERE user=? AND pass=?");
        $stmt->execute([$user, $pass]);
        $count = $stmt->rowCount();

        if ($count > 0) {
            $token = generateToken($user);

            // ارسال به API مقصد با CURL
            $url = 'http://localhost/api08-4/index-private.php';
            $data = json_encode(['token' => $token]);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            echo json_encode([
                'message' => 'Login successful',
                'token' => $token,
                'remote_response' => $response
            ]);
        } else {
            echo json_encode(['error' => 'Invalid credentials']);
        }

        break;

    default:
        // Invalid method
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;


}
