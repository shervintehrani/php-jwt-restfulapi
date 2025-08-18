<?php
require_once 'config.php';
header('Content-Type: application/json');

require 'vendor/autoload.php'; // Include php-jwt library
use Firebase\JWT\JWT;

//$key = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';

function generateToken($user)
{
//    global $secretKey;
    $key = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';
    $payload = [
        'user' => $user,
        'exp' => time() + 30, // +1200 Token expiration (20 minutes)
        'iss' => 'https://whoispack.ir',
        'aud' => 'https://whoispack.ir',
        "iat" => time(), // Current time
        "nbf" => time(), // "nbf" => time()+10   Not valid before in 10 seconds
    ];

    return JWT::encode($payload, $key, 'HS256'); // $jwt
}



$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'POST':
        //Create operation (add a new User)
        /*$data = json_decode(file_get_contents('php://input'), true);
        $user = $data['user'];
        $pass = $data['pass'];*/

        // Read the input data from the client
        $json_data = file_get_contents('php://input');
        $data = json_decode($json_data);

// Extract user and password
        $user = $data->user;
        $pass = $data->pass;
        //echo "<br />user: $user |  pass: $pass<br />";
        $stmt = $conn->prepare("SELECT * FROM user WHERE user=? AND pass=?");
        $stmt->execute([$user, $pass]);
        $count = $stmt->rowCount();
        //echo "<br />Found $count row(s).<br />";
        if ($count > 0) {
            // echo '<br />Welcome<br />';
            $token = generateToken($user);
//            redirectToPrivatePage($token);
            //echo 'token :' . $token;
            $token_json = array("token" => $token, "authorized" => true);
            echo json_encode($token_json);

        } else {

            echo json_encode(['authorized' => false]);
        }
        break;

    default:
        // Invalid method
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
