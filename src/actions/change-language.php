<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";

if(!isset($_POST['language_id'])){
    header("Location: /" );
    exit();
}
$language_id = $_POST['language_id'];
$languageModel = new Language();
$languageModel->setLanguage($language_id);

header("Location: " . $_SERVER['HTTP_REFERER']);
