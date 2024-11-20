<?php

function getLanguages() {
    $db = new App\Config\Database();
    return $db->query("SELECT * FROM language");
}