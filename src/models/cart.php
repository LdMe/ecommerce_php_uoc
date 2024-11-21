<?php

function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function getCart() {
    startSession();
    return $_SESSION['cart'] ?? [];
}
function saveCart($cart) {
    startSession();
    $_SESSION['cart'] = $cart;
}

function getCartTotal() {
    $cart = getCart();
    $total = 0;
    foreach ($cart as $product_id => $quantity) {
        $product = getProductById($product_id);
        $total += $product['price'] * $quantity / 100;
    }
    return $total;
}
function getTotalCartProducts() {
    $cart = getCart();
    return count($cart);
}

function formatProducts($cart,$language_id){
    if(empty($cart)){
        return [];
    }
    $product_ids = array_keys($cart);
    $products = getProductsByIds($product_ids, $language_id);
    foreach ($products as &$product) {
        $product['quantity'] = $cart[$product['product_id']];
        $product['price'] = $product['price'] / 100;
        $product['totalPrice'] = $product['price'] * $product['quantity'];
        //echo $product['name'] . "<br>";
    }
    return $products;
}

function addToCart($product_id, $quantity,$replace=false) {
    // TODO: get cart from session and add product
    $cart = getCart();
    $totalQuantity = $quantity;
    if(isset($cart[$product_id]) && !$replace){
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
    startSession();
    unset($_SESSION['cart']);
}