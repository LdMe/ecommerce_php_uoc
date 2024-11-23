<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/text.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/billing.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";

$languageModel = new language();
$language_id = $languageModel->getSavedLanguage();
$clientModel = new Client();
$client = $clientModel->getLoggedInClient();
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
$client_id = $clientModel->getLoggedInClientId();
if (isset($client_id)) {
    $billingModel = new Billing();
    $lastBilling = $billingModel->getLastByClient($client_id);
    $values = [
        "email" => $lastBilling['email'] ?? "",
        "address" => $lastBilling['address'] ?? "",
        "phone" => $lastBilling['tel'] ?? "",
        "client_id" => $lastBilling['client_id'] ?? ""
    ];
    $billings = $billingModel->getByClient($client_id);
}
$navbar = getNavbar($language_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php echo $navbar; ?>
    <h1><?php echo getTranslation("billing", $language_id); ?></h1>
    <?php
    if (empty($client)) {
        ?>
        <a
            href="/register.php?redirect=billing.php"><?php echo getTranslation("register-billing-title", $language_id); ?></a>
        <?php
    }
    if (isset($billings) && count($billings) > 0) {
        ?>
        <h2><?php echo getTranslation("select-old-billing", $language_id); ?></h2>
        <p><?php echo getTranslation("old-billings-data", $language_id); ?></p>
        <table class="billing-list">
            <thead>
            <tr>
                <th><?php echo getTranslation("email", $language_id); ?></th>
                <th><?php echo getTranslation("address", $language_id); ?></th>
                <th><?php echo getTranslation("phone", $language_id); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($billings as $billing) {
                ?>
                <tr>
                    <td class="billing-email"><?php echo $billing['email']; ?></td>
                    <td class="billing-address"><?php echo $billing['address']; ?></td>
                    <td class="billing-tel"><?php echo $billing['tel']; ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    ?>
    <form class="billing-form" action="/actions/billing.php" method="POST">
        <label for="email"><?php echo getTranslation("email", $language_id); ?></label>
        <input type="hidden" name="client_id" value=<?php echo $values['client_id']; ?>>
        <input type="email" name="email" placeholder="<?php echo $labels["email"]; ?>"
            value="<?php echo $values["email"]; ?>" required>
        <label for="address"><?php echo getTranslation("address", $language_id); ?></label>
        <input type="text" name="address" placeholder="<?php echo $labels["address"]; ?>"
            value="<?php echo $values["address"]; ?>" required>
        <label for="phone"><?php echo getTranslation("phone", $language_id); ?></label>
        <input type="text" name="phone" placeholder="<?php echo $labels["phone"]; ?>"
            value="<?php echo $values["phone"]; ?>" required>
        <section class="form-buttons">
            <a href="/cart.php">
                <button type="button">
                    <?php echo getTranslation("back", $language_id); ?>
                </button>
            </a>
            <button type="submit" class="primary"><?php echo getTranslation("continue", $language_id); ?></button>
        </section>
    </form>

    <script>
        function unselectBillings() {
            const billings = document.querySelectorAll(".billing-list :not(thead) tr");
            billings.forEach(billing => {
                billing.classList.remove("selected");
            });
        }
        const billings = document.querySelectorAll(".billing-list :not(thead) tr");
        billings.forEach(billing => {
            billing.addEventListener("click", () => {
                const email = billing.querySelector(".billing-email").textContent;
                const address = billing.querySelector(".billing-address").textContent;
                const phone = billing.querySelector(".billing-tel").textContent;
                document.querySelector(".billing-form input[name=email]").value = email;
                document.querySelector(".billing-form input[name=address]").value = address;
                document.querySelector(".billing-form input[name=phone]").value = phone;
                unselectBillings();
                billing.classList.add("selected");

            });
        });
        const inputs = document.querySelectorAll(".billing-form input");
        inputs.forEach(input => {
            input.addEventListener("input", () => {
                unselectBillings();
            });
        });
    </script>
</body>

</html>