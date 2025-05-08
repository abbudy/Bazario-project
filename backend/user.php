<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../auth/login.html");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Bazario</title>
</head>

<body>
    <h2>Welcome, <?= $_SESSION['user_name'] ?></h2>
    <a href="../logout.php">Logout</a>
</body>

</html>