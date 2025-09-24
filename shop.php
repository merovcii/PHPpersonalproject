<?php
$db = new PDO("mysql:host=localhost;dbname=ecommerce", "root", "");
$products = $db->query("SELECT * FROM products")->fetchAll();
foreach ($products as $product) {
   echo "<div>{$product['name']} - {$product['price']} USD</div>";
}
?>