<?php
session_start();

function userRoleCheck($role) {
  if (!$_SESSION['user']) {
    http_response_code(401);
    die();
  }
  if ($role == 'User' && !($_SESSION['user']['role'] != 'User' || $_SESSION['user']['role'] == 'Staff' || $_SESSION['user']['role'] == 'Admin')) {
    http_response_code(401);
    die();
  } elseif ($role == 'Staff' && !($_SESSION['user']['role'] == 'Staff' || $_SESSION['user']['role'] == 'Admin')) {
    http_response_code(401);
    die();
  } elseif ($role == 'Admin' && !($_SESSION['user']['role'] == 'Admin')) {
    http_response_code(401);
    die();
  }
}
