<?php
require_once 'config.php';

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
// ****************************************
//if validateToken=true then return token else "401 Unauthorized"





// Set the content type to JSON
header('Content-Type: application/json');
// Handle HTTP methods
$method = $_SERVER['REQUEST_METHOD'];



$input = json_decode(file_get_contents('php://input'),true);
$token = $input['token'];
if (!isset($input['token'])) {
    echo "❌ توکن ارسال نشده است.";
    exit;
}


$secretKey = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';

try {
    $decoded = JWT::decode($token, new Key($secretKey, 'HS256'));
    echo "✅ توکن معتبر است.\n";
    print_r($decoded);
} catch (Exception $e) {
    echo "❌ توکن نامعتبر است: " . $e->getMessage();
}






// Your private page content
echo "Welcome to the private page! You are authenticated.";


switch ($method) {
    case 'GET':
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $domain_name = $_GET['domain_name'];
            $stmt = $conn->query("SELECT * FROM whois_log WHERE domain_name = '$domain_name' ORDER BY DESC LIMIT 10");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }else {
            echo "Token not found";
        }
        // Read operation (fetch user)
        $dn=$_GET['domain_name'];
        echo "<br />dn: $dn<br />";
        if (!isset($_GET['domain_name'])) {
            // Validate JWT token
            // Fetch user details by ID
            // Return user data

            $stmt = $conn->query('SELECT log_id, domain_name, title, ip,  domain_creation_date FROM whois_log ORDER BY log_id DESC  LIMIT 10');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }else{
            $domain_name=$_GET['domain_name'];
            //echo "domain_name";
            $stmt = $conn->query("SELECT log_id, domain_name, title, ip,  domain_creation_date FROM whois_log WHERE domain_name='$domain_name' ORDER BY log_id DESC  LIMIT 10");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }
        break;
    case 'POST':

    /*{
        "user":"sh",
        "pass":"1",
        "first_name":"Shervin",
        "family":"Tehrani",
        "email":"Shervin@gmail.com"
    }*/
        // Create operation (add a new User)
        $data = json_decode(file_get_contents('php://input'), true);
        $user = $data['user'];
        $pass = $data['pass'];
        $first_name = $data['first_name'];
        $family = $data['family'];
        $email = $data['email'];

        $stmt = $conn->prepare('INSERT INTO user (user, pass, first_name, family, email) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$user, $pass, $first_name, $family, $email]);

        echo json_encode(['message' => 'User added successfully']);
        break;
    case 'PUT':
        // Update operation (edit a User)
        parse_str(file_get_contents('php://input'), $data);        $id = $data['id'];
        $title = $data['title'];
        $author = $data['author'];
        $published_at = $data['published_at'];

        $stmt = $conn->prepare('UPDATE user SET title=?, author=?, published_at=? WHERE id=?');
        $stmt->execute([$title, $author, $published_at, $id]);

        echo json_encode(['message' => 'User updated successfully']);
        break;
    case 'DELETE':
        // Delete operation (remove a User)
        $id = $_GET['id'];

        $stmt = $conn->prepare('DELETE FROM user WHERE id=?');
        $stmt->execute([$id]);

        echo json_encode(['message' => 'User deleted successfully']);
        break;
    default:
        // Invalid method
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
?>