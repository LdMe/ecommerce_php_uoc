<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/cart.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/language.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/text.php";

$languageModel = new language();
$language_id = $languageModel->getSavedLanguage();

$product_id = $_POST['product_id'] ?? 0;
$quantity = $_POST['quantity'] ?? 0;
$cart = new Cart();
if ($product_id > 0 && $quantity > 0) {
    $message = getTranslation("cart-product-add-success", $language_id);
    $cart->addProduct($product_id, $quantity);
    header("Location: /cart.php");
}
else{
    $message = getTranslation("cart-product-add-error", $language_id);

}