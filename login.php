<?php
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  http_response_code(400);
  die();
}

$email = $_POST["email"];
$password = sha1(trim($_POST["password"]));

$query = $conn->prepare('SELECT users.id as id, roles.name as role, email, users.name as name FROM users JOIN roles on roles.id = users.role WHERE password=:password AND email=:email LIMIT 1');
$query->bindParam(':email', $email);
$query->bindParam(':password', $password);
$query->execute();

$user = $query->fetch(PDO::FETCH_ASSOC);
if ($user) {
  $_SESSION['user'] = $user;
  echo json_encode(Array('message'=>'Login successful.', 'user'=>$user));
} else {
  http_response_code(401);
  echo json_encode(Array('message'=>'Login not successful.'));
}

$conn = null;
