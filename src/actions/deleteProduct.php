<?php

require_once "models/cart.php";
require_once "config/language.php";


require_once "models/product.php";
require_once "models/text.php";

$product_id = $_POST['product_id'] ?? 0;
if ($product_id > 0) {
    $cart = new Cart();
    $cart->deleteProduct($product_id);
    header("Location: /cart.php");
}