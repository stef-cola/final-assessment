<?php
include "includes/authHeader.php";

include "includes/db.php";
header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
  default:
  case 'GET':
    $query = $conn->prepare("SELECT * FROM cars");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    break;

  case 'POST':
    userRoleCheck('Staff');
    if (isset($_POST["type"]) && isset($_POST["manufacturer"]) && isset($_POST["model"]) && isset($_POST["price"]) && isset($_POST["description"]) && isset($_POST["details_kms"]) && isset($_POST["details_doors"]) && isset($_POST["details_year"]) && isset($_POST["image"])) {
      $query = $conn->prepare("INSERT INTO cars (type, manufacturer, model, price, description, details_kms, details_doors, details_year, image, owner) VALUES (:type, :manufacturer, :model, :price, :description, :details_kms, :details_doors, :details_year, :image, :owner)");
      $query->bindParam(':type', $_POST['type']);
      $query->bindParam(':manufacturer', $_POST['manufacturer']);
      $query->bindParam(':model', $_POST['model']);
      $query->bindParam(':price', $_POST['price']);
      $query->bindParam(':description', $_POST['description']);
      $query->bindParam(':details_kms', $_POST['details_kms']);
      $query->bindParam(':details_doors', $_POST['details_doors']);
      $query->bindParam(':details_year', $_POST['details_year']);
      $query->bindParam(':image', $_POST['image']);
      $query->bindParam(':owner', $_SESSION['user']['id']);
      $query->execute();
      echo json_encode(Array("message"=>"Car saved successfully."));
    }
    break;
}

$conn = null;
