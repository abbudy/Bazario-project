<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $existingUser = $usersCollection->findOne(['email' => $email]);
  if ($existingUser) {
    echo "Email already registered.";
    exit;
  }

  $usersCollection->insertOne([
    'name' => $name,
    'email' => $email,
    'password' => $password
  ]);

  echo "Registration successful. <a href='auth/login.html'>Login here</a>";
}
?>