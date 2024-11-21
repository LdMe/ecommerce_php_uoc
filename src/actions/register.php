<?php

require_once "../models/client.php";
require_once "../config/Database.php";

$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : null;
$correctUrl = "/login.php" . ($redirect ? "?redirect=$redirect" : "");
$incorrectUrl = "/register.php" . ($redirect ? "?redirect=$redirect" : "");
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $result = registerClient($name,$email, $password, $confirmPassword);
    if ($result) {
        header("Location: $correctUrl");
    }
    else {
        header("Location: $incorrectUrl");
    }
}
