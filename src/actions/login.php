<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";
$redirect = $_GET['redirect'] ?? null;
$correctUrl = "/";
$incorrectUrl = "/login.php";
$seachParams = [];
if ($redirect) {
    $seachParams[] = "redirect=$redirect";
}
if (isset($_POST['email']) && isset($_POST['password'])) {
    $clientModel = new Client();
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {

        $result = $clientModel->loginRegistered($email, $password);
    } catch (Exception $e) {
        $message = $e->getMessage();
        $seachParams[] = "message=$message";
        $seachParams[] = "message-type=error";
        $location = $incorrectUrl . "?" . implode("&", $seachParams);
        header("Location: $location");
        exit();
    }
    $seachParams[] = "message-type=success";
    $location = $correctUrl . "?" . implode("&", $seachParams);
    header("Location: $location");

}else {
    header("Location: /login.php");
}

