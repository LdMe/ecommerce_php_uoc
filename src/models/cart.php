<?php


function getCart() {
    $cart = json_decode($_COOKIE['cart'] ?? '[]', true);
    return $cart;
}
function saveCart($cart) {
    setcookie('cart', json_encode($cart));
}

function formatProducts($cart,$language_id){
    $product_ids = array_keys($cart);
    $products = getProductsByIds($product_ids, $language_id);
    foreach ($products as &$product) {
        $product['quantity'] = $cart[$product['product_id']];
        //echo $product['name'] . "<br>";
    }
    return $products;
}

function addToCart($product_id, $quantity) {
    // TODO: get cart from session and add product
    $cart = getCart();
    $totalQuantity = $quantity;
    if(isset($cart[$product_id])){
        $totalQuantity += $cart[$product_id];
    }
    $cart[$product_id] = $totalQuantity;
    saveCart($cart);
}

function deleteProduct($product_id){
    $cart = getCart();
    unset($cart[$product_id]);
    saveCart($cart);
}

function deleteCart() {
    setcookie('cart','', time() -0);
}