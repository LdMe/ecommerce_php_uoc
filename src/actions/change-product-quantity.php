<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/cart.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/language.php";


$product_id = $_POST['product_id'] ?? 0;
if ($product_id > 0) {
    $cart = new Cart();
    $quantity = $_POST['quantity'] ?? 0;
    if($quantity <= 0){
        header("Location: /cart.php");
        exit();
    }
    $cart->addProduct($product_id, $quantity, true);
    header("Location: /cart.php");
}