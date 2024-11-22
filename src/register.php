<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/text.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/language.php";

$languageModel = new language();
$language_id = $languageModel->getSavedLanguage();
$labels = [
    "name" => getTranslation("name", $language_id),
    "email" => getTranslation("email", $language_id),
    "password" => getTranslation("password", $language_id),
    "confirm-password" => getTranslation("confirm-password", $language_id),
];
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : null;
$actionUrl  = "/actions/register.php" . ($redirect ? "?redirect=$redirect" : "");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo getTranslation("register", $language_id); ?></h1>
    <form action=<?php echo $actionUrl; ?> method="POST">
        <input type="text" name="name" placeholder="<?php echo $labels["name"]; ?>">
        <input type="email" name="email" placeholder="<?php echo $labels["email"]; ?>">
        <input type="password" name="password" placeholder="<?php echo $labels["password"]; ?>">
        <input type="password" name="confirm-password" placeholder="<?php echo $labels["confirm-password"]; ?>">
        <button type="submit"><?php echo getTranslation("register", $language_id); ?></button>
    </form>
    <a href="/login.php?redirect=<?php echo $redirect; ?>"><?php echo getTranslation("login", $language_id); ?></a>
</body>
</html>