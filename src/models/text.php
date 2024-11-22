<?php


require_once $_SERVER['DOCUMENT_ROOT'] ."/config/Database.php";



function getTranslation($text_id, $language_id) {
    $db = Database::getInstance();
    $result = $db->query("SELECT * FROM text_with_language WHERE language_id = $language_id AND text_id = '$text_id'");
    return $result[0]['content'];
}