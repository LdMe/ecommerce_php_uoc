<?php
require_once "models/cart.php";
require_once "config/language.php";


$product_id = $_POST['product_id'] ?? 0;
if ($product_id > 0) {
    $cart = new Cart();
    $quantity = $_POST['quantity'] ?? 0;
    $cart->addProduct($product_id, $quantity, true);
    header("Location: /cart.php");
}