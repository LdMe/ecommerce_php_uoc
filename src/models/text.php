<?php


require_once $_SERVER['DOCUMENT_ROOT'] ."/config/Database.php";



function getTranslation($text_id, $language_id) {
    $db = Database::getInstance();
    $result = $db->query("SELECT * FROM text_with_language WHERE language_id = $language_id AND text_id = ?",[$text_id]);
    if(count($result) > 0) {
        return $result[0]['content'];
    }
    $result = $db->query("SELECT * FROM text_with_language WHERE language_id = 1 AND text_id = ?",[$text_id]);
    if(count($result) > 0) {
        return $result[0]['content'];
    }
    return $text_id;
}