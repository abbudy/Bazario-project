<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = htmlspecialchars($_POST['email']);
  $password = $_POST['password'];

  $user = $usersCollection->findOne(['email' => $email]);

  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = (string)$user['_id'];
    $_SESSION['user_name'] = $user['name'];
    header("Location: user/dashboard.php");
    exit;
  } else {
    echo "Invalid email or password.";
  }
}
?>