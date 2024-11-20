<?php


function getCart() {
    $cart = json_decode($_COOKIE['cart'] ?? '[]', true);
    return $cart;
}
function saveCart($cart) {
    setcookie('cart', json_encode($cart));
}

function addToCart($product_id, $quantity) {
    // TODO: get cart from session and add product
    $cart = getCart();
    $cart[$product_id] = $quantity;
    saveCart($cart);
}

function deleteCart() {
    setcookie('cart','', time() -0);
}