<?php
session_start();
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb+srv://USERNAME:PASSWORD@cluster.mongodb.net/bazario");
$orders = $client->bazario->orders;

// Check login
if (!isset($_SESSION['user_id'])) {
    echo "You must be logged in to checkout.";
    exit;
}

// Simulated cart session data (replace with real cart)
$cart = $_SESSION['cart'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order = [
        'user_id' => $_SESSION['user_id'],
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'payment_method' => $_POST['payment_method'],
        'items' => $cart,
        'total' => array_reduce($cart, fn($sum, $item) => $sum + ($item['price'] * $item['quantity']), 0),
        'status' => 'pending',
        'placed_at' => new MongoDB\BSON\UTCDateTime()
    ];
    
    $result = $orders->insertOne($order);
    
    $_SESSION['cart'] = []; // clear cart
    header("Location: order_success.php?order_id=" . $result->getInsertedId());
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
</head>

<body>
    <h2>Checkout</h2>
    <form method="post">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Address: <textarea name="address" required></textarea></label><br>
        <label>Payment:
            <select name="payment_method" required>
                <option value="cod">Cash on Delivery</option>
                <option value="paypal">PayPal</option>
            </select>
        </label><br><br>
        <button type="submit">Place Order</button>
    </form>

    <h3>Items:</h3>
    <ul>
        <?php foreach ($cart as $item): ?>
        <li><?=htmlspecialchars($item['title'])?> (x<?=intval($item['quantity'])?>) -
            $<?=number_format($item['price'],2)?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>