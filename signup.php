<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  http_response_code(400);
  die();
}

$name = $_POST["name"];
$email = $_POST["email"];
$password = sha1(trim($_POST["password"]));

$query = $conn->prepare('INSERT INTO users (email, name, password) VALUES (:email, :name, :password)');
$query->bindParam(':name', $name);
$query->bindParam(':email', $email);
$query->bindParam(':password', $password);
$query->execute();

echo json_encode(Array('message'=>'Signup successful.'));

$conn = null;
