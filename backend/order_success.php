<?php
$orderId = $_GET['order_id'] ?? 'Unknown';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Order Success</title>
</head>

<body>
    <h2>Thank you for your order!</h2>
    <p>Your order ID is: <?=htmlspecialchars($orderId)?></p>
    <a href="index.php">Return to Shop</a>
</body>

</html>