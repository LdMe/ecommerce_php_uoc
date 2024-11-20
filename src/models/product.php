<?php

// funciones de base de datos relacionadas con productos

function getProducts($language_id) {
    $db = new App\Config\Database();
    return $db->query("SELECT * FROM product_with_language WHERE language_id = ?",[$language_id]);
}
function getProductById($id, $language_id) {
    $db = new App\Config\Database();
    return $db->query("SELECT * FROM product_with_language WHERE product_id =? AND language_id = ?",[$id,$language_id])[0];  
}

function getProductsByIds($ids, $language_id) {
    $db = new App\Config\Database();
    $placeholders = str_repeat('?,', count($ids) - 1) . '?';
    $values = array_merge($ids,[$language_id]);
    return $db->query("SELECT * FROM product_with_language WHERE product_id IN ($placeholders) AND language_id = ?",$values);
}
function getProductsByName($name , $language_id) {
    $db = new App\Config\Database();
    return $db->query("SELECT * FROM product_with_language WHERE name LIKE '%?%' AND language_id = ?",[$name,$language_id]);
}


function getProductsByCategory($category, $language_id) {
    $db = new App\Config\Database();
    return $db->query("SELECT product_with_language.* FROM product_has_category INNER JOIN product_with_language ON product_has_category.product_id = product_with_language.product_id WHERE category_id = ? AND language_id = ?",[$category,$language_id]);
}