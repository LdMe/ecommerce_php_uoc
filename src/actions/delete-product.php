<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/cart.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/language.php";


require_once $_SERVER['DOCUMENT_ROOT'] ."/models/product.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/text.php";

$product_id = $_POST['product_id'] ?? 0;
if ($product_id > 0) {
    $cart = new Cart();
    $cart->deleteProduct($product_id);
    header("Location: /cart.php");
}
else {
    header("Location: /");
}