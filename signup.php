<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  http_response_code(400);
  die();
}

$data = json_decode(file_get_contents("php://input"),true);
$name = $data["name"];
$email = $data["email"];
$password = sha1(trim($data["password"]));

$query = $conn->prepare('INSERT INTO users (email, name, password) VALUES (:email, :name, :password)');
$query->bindParam(':name', $name);
$query->bindParam(':email', $email);
$query->bindParam(':password', $password);
$query->execute();

echo json_encode(Array('message'=>'Signup successful.'));
// var_dump($query->errorInfo());

$conn = null;
