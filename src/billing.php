<?php

require_once "./config/Database.php";
require_once "./models/client.php";
require_once "./models/text.php";
require_once "./config/language.php";
require_once "./models/billing.php";

$user = getLoggedInClient();
$labels = [
    "email" => getTranslation("email", $language_id),
    "address" => getTranslation("address", $language_id),
    "phone" => getTranslation("phone", $language_id)
];
$values = [
    "email" => "",
    "address" => "",
    "phone" => "",
    "client_id" => ""
];
if (!empty($user)) {
    $lastBilling = getLastBilling($user['client_id']);
    $values = [
        "email" => $lastBilling['email'] ?? "",
        "address" => $lastBilling['address'] ?? "",
        "phone" => $lastBilling['tel'] ?? "",
        "client_id" => $lastBilling['client_id'] ?? ""
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?php echo getTranslation("billing", $language_id); ?></h1>
    <?php
    if (empty($user)) {
        ?>
        <a href="/register.php?redirect=billing.php"><?php echo getTranslation("register-billing-title", $language_id); ?></a>
        <?php
    }
    ?>
    <form action="/actions/billing.php" method="POST">
        <input type="hidden" name="client_id" value=<?php echo $values['client_id']; ?>>
        <input type="text" name="email" placeholder="<?php echo $labels["email"]; ?>"
            value="<?php echo $values["email"]; ?>">
        <input type="text" name="address" placeholder="<?php echo $labels["address"]; ?>"
            value="<?php echo $values["address"]; ?>">
        <input type="text" name="phone" placeholder="<?php echo $labels["phone"]; ?>"
            value="<?php echo $values["phone"]; ?>">
        <button type="submit"><?php echo getTranslation("save", $language_id); ?></button>
    </form>
</body>

</html>