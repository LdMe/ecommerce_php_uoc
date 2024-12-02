<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/client.php";

$redirect =  $_GET['redirect'] ?? null;
$correctUrl = "/login.php";
$incorrectUrl = "/register.php";
$seachParams =[];
if($redirect){
    $seachParams[] = "redirect=$redirect";
}
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $clientModel = new Client();
    try{
        $old_client_id = $clientModel->getLoggedInClientId();
        $result = $clientModel->registerClient($name,$email, $password, $confirmPassword,$old_client_id);
    }catch(Exception $e){
        $message = $e->getMessage();
        $seachParams[] = "message=$message";
        $seachParams[] = "message-type=error";
        $location = $incorrectUrl . "?" . implode("&", $seachParams);
        header("Location: $location");
        exit();
    }
    $message="register-success";
    $seachParams[] = "message=$message";
    $seachParams[] = "message-type=success";
    $location = $correctUrl . "?" . implode("&", $seachParams);
    header("Location: $location");
}else {
    header("Location: /register.php");
}
