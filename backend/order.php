<?php
require 'vendor/autoload.php';
require 'backend/db.php';
session_start();
$user_id = $_SESSION['user_id'] ?? 'guest123';

$orders = $db->orders->find(['user_id' => $user_id]);
?>

<h2>Your Orders</h2>
<ul>
    <?php foreach ($orders as $order): ?>
    <li>
        Order #<?php echo $order->_id; ?> - Status: <?php echo $order->status; ?> -
        Total: $<?php echo $order->total; ?>
    </li>
    <?php endforeach; ?>
</ul>