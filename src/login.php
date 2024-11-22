
<?php
require_once "./components/navbar.php";
require_once "./config/language.php";

$labels = [
    "email" => getTranslation("email", $language_id),
    "password" => getTranslation("password", $language_id),
    "login" => getTranslation("login", $language_id),
];
$redirect = isset($_GET['redirect']) ? $_GET['redirect'] : null;
$actionUrl  = "/actions/login.php" . ($redirect ? "?redirect=$redirect" : "");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $actionUrl; ?>" method="POST">
        <input type="text" name="email" placeholder="<?php echo $labels["email"]; ?>">
        <input type="password" name="password" placeholder="<?php echo $labels["password"]; ?>">
        <button type="submit"><?php echo $labels["login"]; ?></button>
    </form>
    <a href="/register.php?redirect=login.php"><?php echo getTranslation("register", $language_id); ?></a>
</body>
</html>