<?php
require 'db.php';

$collection = $db->products;
$products = $collection->find()->toArray();

header('Content-Type: application/json');
echo json_encode($products);
?>