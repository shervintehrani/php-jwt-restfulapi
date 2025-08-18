<?php
header('Content-Type: application/json');

require_once 'config.php';
$json_data = file_get_contents('php://input');
$data = json_decode($json_data);
require_once 'validate-token.php';
$key = "bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=";
$token = $data->token;
//echo "<br />token: $token<br />";
$result = validateToken($token, $key);
//echo "<br />result: $result<br />";
if (!$result) die ("<br />Not authorized !</br />");
//echo "<br />welcome to protected page<br />";

//echo ("<br /> SERVER['HTTP_AUTHORIZATION']: ".$_SERVER['HTTP_AUTHORIZATION']."<br />");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['token'])) {
            $token = $_GET['token'];
            $domain_name = $_GET['domain_name'];
            $stmt = $conn->query("SELECT * FROM whois_log WHERE domain_name = '$domain_name' ORDER BY DESC LIMIT 10");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } else {
            echo "Token not found";
        }
        $dn = $_GET['domain_name'];
        echo "<br />dn: $dn<br />";
        if (!isset($_GET['domain_name'])) {
            $stmt = $conn->query('SELECT log_id, domain_name, title, ip,  domain_creation_date FROM whois_log ORDER BY log_id DESC  LIMIT 10');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } else {
            $domain_name = $_GET['domain_name'];
            //echo "domain_name";
            $stmt = $conn->query("SELECT log_id, domain_name, title, ip,  domain_creation_date FROM whois_log WHERE domain_name='$domain_name' ORDER BY log_id DESC  LIMIT 10");
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        }
        break;

    case ($method = 'POST' && isset($_POST['domain_name'])):
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['user'])) $user = $data['user'];
        $domain_name = false;
        if (isset($data['domain_name'])) {
            $domain_name = $data['domain_name'];
            echo "<br />domain_name : $domain_name<br />";
        }


        if ($domain_name) {
//        $stmt = $conn->query("SELECT * FROM whois_log WHERE domain_name = '$domain_name' ORDER BY DESC LIMIT 10");
            $query = "SELECT log_id, domain_name, title, ip,  domain_creation_date FROM whois_log WHERE domain_name = '$domain_name' ORDER BY log_id DESC LIMIT 10";
//        echo "<br />query: $query<br />";
            $stmt = $conn->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } else {
            $stmt = $conn->query("SELECT log_id, domain_name, title, ip,  domain_creation_date FROM whois_log  ORDER BY log_id DESC  LIMIT 10");
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
        parse_str(file_get_contents('php://input'), $data);
        $id = $data['id'];
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