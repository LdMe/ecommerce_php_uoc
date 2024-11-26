<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/text.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";

$languageModel = new language();
$language_id = $languageModel->getSavedLanguage();
$labels = [
    "name" => getTranslation("name", $language_id),
    "email" => getTranslation("email", $language_id),
    "password" => getTranslation("password", $language_id),
    "confirm-password" => getTranslation("confirm-password", $language_id),
];
$redirect = $_GET['redirect'] ?? null;
$actionUrl = "/actions/register.php" . ($redirect ? "?redirect=$redirect" : "");
$message = $_GET['message'] ?? null;
$messageType = $_GET['message-type'] ?? null;
$navbar = getNavbar($language_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getTranslation("register", $language_id); ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php echo $navbar; ?>
    <h1 class="centered"><?php echo getTranslation("register", $language_id); ?></h1>
    <?php if (isset($message)) {
        ?>
        <p class="message <?php echo $messageType ?? "error" ?>"> <?php echo getTranslation($message, $language_id); ?></p>
        <?php
    } ?>
    <form class="login-form" action=<?php echo $actionUrl; ?> method="POST">
        <label for="name"><?php echo $labels["name"]; ?></label>
        <input type="text" name="name" placeholder="<?php echo $labels["name"]; ?>" required>
        <label for="email"><?php echo $labels["email"]; ?></label>
        <input type="email" name="email" placeholder="<?php echo $labels["email"]; ?>" required>
        <label for="password"><?php echo $labels["password"]; ?></label>
        <input type="password" name="password" placeholder="<?php echo $labels["password"]; ?>" required>
        <label for="confirm-password"><?php echo $labels["confirm-password"]; ?></label>
        <input type="password" name="confirm-password" placeholder="<?php echo $labels["confirm-password"]; ?>"
            required>
        <button class="primary" type="submit"><?php echo getTranslation("register", $language_id); ?></button>
    </form>
    <section class="centered">
        <a href="/login.php?redirect=<?php echo $redirect; ?>"><?php echo getTranslation("login", $language_id); ?></a>
    </section>
</body>

</html>