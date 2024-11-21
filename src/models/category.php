<?php


function getCategories($language_id){
    $db = new \App\Config\Database();
    $db->connect();
    return $db->getConnection()->query("SELECT * FROM category_with_language WHERE language_id = $language_id");
}