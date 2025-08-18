<?php
// config.php

$host = 'localhost';
$dbName = 'api';
$dbUser = 'api';
$dbPass = '1';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
