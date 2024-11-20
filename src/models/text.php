<?php

function getTranslation($text_id, $language_id) {
    $db = new App\Config\Database();
    $result = $db->getConnection()->query("SELECT * FROM text_with_language WHERE language_id = $language_id AND text_id = '$text_id'");
    echo $result->fetch(PDO::FETCH_ASSOC)['content'];
}