<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";

$languageModel = new language();
$language_id = $languageModel->getSavedLanguage();
$labels = [
    "email" => getTranslation("email", $language_id),
    "password" => getTranslation("password", $language_id),
    "login" => getTranslation("login", $language_id),
];
$redirect = $_GET['redirect'] ?? null;
$actionUrl = "/actions/login.php" . ($redirect ? "?redirect=$redirect" : "");
$message = $_GET['message'] ?? null;
$messageType = $_GET['message-type'] ?? null;
$navbar = getNavbar($language_id);
$registerUrl = "/register.php?" . ($redirect ? "redirect=$redirect" : "");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/public/img/favicon.ico">
    <title><?php echo getTranslation("login", $language_id); ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php echo $navbar; ?>
    <main>
        <h1 class="centered"><?php echo getTranslation("login", $language_id); ?></h1>
        <?php if (isset($message)) {
            ?>
            <p class="message <?php echo $messageType;?> "> <?php echo getTranslation($message, $language_id); ?></p>
            <?php
        } ?>
        <form class="login-form" action="<?php echo $actionUrl; ?>" method="POST">
            <label for="email"><?php echo $labels["email"]; ?></label>
            <input type="text" name="email" placeholder="<?php echo $labels["email"]; ?>" required>
            <label for="password"><?php echo $labels["password"]; ?></label>
            <input type="password" name="password" placeholder="<?php echo $labels["password"]; ?>" required>
            <button class="primary" type="submit"><?php echo $labels["login"]; ?></button>
        </form>
        <section class="centered">
            <a href="<?php echo $registerUrl; ?>"><?php echo getTranslation("register", $language_id); ?></a>
        </section>
    </main>
</body>

</html>