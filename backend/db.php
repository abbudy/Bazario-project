<?php
require '../vendor/autoload.php'; 

$client = new MongoDB\Client(
  "mongodb+srv://<Bazarrio>:<123456abz>@cluster0.ckfah3c.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0"
);

$db = $client->selectDatabase("web-project"); // 
?>