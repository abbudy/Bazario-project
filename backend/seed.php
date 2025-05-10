<?php
require '../vendor/autoload.php'; 

$client = new MongoDB\Client("mongodb+srv://<Bazarrio>:<123456abz>@cluster0.ckfah3c.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0"); 
$db = $client->bazario;

// --- USERS ---
$users = $db->users;
$users->insertOne([
    'username' => 'admin',
    'email' => 'admin@bazario.com',
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // pre-hashed
    'first_name' => 'Admin',
    'last_name' => 'User',
    'role' => 'admin',
    'created_at' => new MongoDB\BSON\UTCDateTime(),
    'updated_at' => new MongoDB\BSON\UTCDateTime()
]);

// --- CATEGORIES ---
$categories = $db->categories;
$categoryData = [
    ['name' => 'Electronics', 'description' => 'Electronic devices and accessories'],
    ['name' => 'Clothing', 'description' => 'Fashion and apparel'],
    ['name' => 'Home & Kitchen', 'description' => 'Home decor and kitchen appliances'],
    ['name' => 'Books', 'description' => 'Books and publications'],
    
];
$categories->insertMany($categoryData);

// --- PRODUCTS ---
$products = $db->products;
$catList = $categories->find()->toArray(); // Fetch inserted categories
$sampleProduct = [
    'category_id' => $catList[0]['000000'], 
    'name' => 'Wireless Headphones',
    'description' => 'Noise-cancelling over-ear headphones.',
    'price' => 89.99,
    'stock' => 25,
    'image_url' => 'https://i.etsystatic.com/59337687/r/il/b01082/6838001636/il_1588xN.6838001636_c94y.jpg',
    'is_featured' => true,
    'created_at' => new MongoDB\BSON\UTCDateTime(),
    'updated_at' => new MongoDB\BSON\UTCDateTime()
];
$products->insertOne($sampleProduct);

// --- COLLECTIONS: cart, orders, order_items (structure only) ---
$db->createCollection('cart');
$db->createCollection('orders');
$db->createCollection('order_items');

echo "✅ Database seeded successfully.";
?>