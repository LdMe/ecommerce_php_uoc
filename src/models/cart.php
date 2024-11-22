<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/product.php";


class Cart {
    private $productModel;
    public function __construct() {
        $this->productModel = new Product();
        $this->startSession();
    }
    private function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function get() {
        return $_SESSION['cart'] ?? [];
    }
    public function save($cart) {
        $_SESSION['cart'] = $cart;
    }

    public function getTotal() {
        $cart = $this->get();
        $total = 0;
        foreach ($cart as $product_id => $quantity) {
            $product = $this->productModel->getById($product_id);
            $total += $product['price'] * $quantity / 100;
        }
        return $total;
    }
    public function getTotalProducts() {
        $cart = $this->get();
        return count($cart);
    }
    public function getFormattedProducts($language_id) {
        $cart = $this->get();
        if (empty($cart)) {
            return [];
        }
        $product_ids = array_keys($cart);
        $products = $this->productModel->getByIds($product_ids, $language_id);
        foreach ($products as &$product) {
            $product['quantity'] = $cart[$product['product_id']];
            $product['price'] /= 100;
            $product['totalPrice'] = $product['price'] * $product['quantity'];
        }
        return $products;
    }
    public function addProduct($product_id, $quantity,$replace=false) {
        $cart = $this->get();
        $totalQuantity = $quantity;
        if(isset($cart[$product_id]) && !$replace){
            $totalQuantity += $cart[$product_id];
        }
        $cart[$product_id] = $totalQuantity;
        $this->save($cart);
    }

    public function deleteProduct($product_id) {
        $cart = $this->get();
        unset($cart[$product_id]);
        $this->save($cart);
    }

    public function delete(){
        unset($_SESSION['cart']);
    }

}

