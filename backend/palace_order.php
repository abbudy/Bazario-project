<?php
require '../vendor/autoload.php';
require 'db.php';

session_start();
$user_id = $_SESSION['user_id'] ?? 'guest123'; // Replace with real session ID

$data = json_decode(file_get_contents('php://input'), true);
$items = $data['items'] ?? [];
$total = $data['total'] ?? 0;

$order = [
    'user_id' => $user_id,
    'items' => $items,
    'total' => $total,
    'status' => 'Processing',
    'created_at' => new MongoDB\BSON\UTCDateTime()
];

$result = $db->orders->insertOne($order);

echo json_encode(['success' => true, 'order_id' => (string)$result->getInsertedId()]);
?>