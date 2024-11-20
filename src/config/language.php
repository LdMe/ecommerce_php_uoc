<?php

if (isset($_GET['language_id'])) {
    setcookie('language_id', $_GET['language_id']);
}
$language_id = $_GET['language_id'] ?? $_COOKIE['language_id'] ?? 1;

