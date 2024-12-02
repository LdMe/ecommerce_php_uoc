<?

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/billing.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/cart.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/text.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";

$languageModel = new Language();
$language_id = $languageModel->getSavedLanguage();
$navbar = getNavbar($language_id);
$clientModel = new Client();
$client = $clientModel->getLoggedInClient();
$client_id = empty($client) ? $clientModel->getLoggedInClientId() : $client['client_id'];
if (!isset($client_id)) {
    header("Location: /");
    exit();
}

$cartModel = new Cart();
$billingModel = new Billing();
$billing = $billingModel->getLastByClient($client_id);
$cartTotal = $cartModel->getTotal();
if ($cartTotal == 0) {
    header("Location: /");
    exit();
}
if (empty($billing)) {
    header("Location: /billing.php");
    exit();
}
$products = $cartModel->getFormattedProducts($language_id);
$labels = [
    "email" => getTranslation("email", $language_id),
    "address" => getTranslation("address", $language_id),
    "phone" => getTranslation("phone", $language_id)
];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/public/img/favicon.ico">
    <title><?php echo getTranslation("purchase-title", $language_id); ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php echo $navbar; ?>
    <h1><?php echo getTranslation("purchase-title", $language_id); ?></h1>

    <h2><?php echo getTranslation("billing", $language_id); ?></h2>
    <table class="billing-data">
        <tr>
            <th><?php echo getTranslation("email", $language_id); ?></th>
            <td><?php echo $billing['email']; ?></td>
        </tr>
        <tr>
            <th><?php echo getTranslation("address", $language_id); ?></th>
            <td><?php echo $billing['address']; ?></td>
        </tr>
        <tr>
            <th><?php echo getTranslation("phone", $language_id); ?></th>
            <td><?php echo $billing['tel']; ?></td>
        </tr>
    </table>

    <h2><?php echo getTranslation("cart", $language_id); ?></h2>
    <table class="cart-list">
        <tr>
            <th><?php echo getTranslation("image", $language_id); ?></th>
            <th><?php echo getTranslation("name", $language_id); ?></th>
            <th><?php echo getTranslation("quantity", $language_id); ?></th>
            <th><?php echo getTranslation("price", $language_id); ?></th>
            <th><?php echo getTranslation("total", $language_id); ?></th>
        </tr>

        <?php foreach ($products as $product) { ?>
            <tr class="cart-product-card">
                <td>
                    <img class="cart-product-image" src=<?php echo $product['image']; ?> class='product-image' alt=<?php echo $product['name']; ?>>
                </td>
                <td>
                    <?php echo $product['name']; ?>
                </td>
                <td>
                    <?php echo $product['quantity']; ?>
                </td>
                <td>
                    <?php echo formatPrice($product['price']); ?>€
                </td>
                <td>
                    <?php echo formatPrice($product['totalPrice']); ?>€
                </td>
            </tr>
        <?php }
        ; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td> <b><?php echo getTranslation("total", $language_id); ?></b></td>
            <td>
                <b><?php echo formatPrice($cartTotal); ?>€</b>
            </td>

        </tr>
    </table>
    <form class="purchase-form" action="/actions/purchase.php" method="POST">
        <input type="hidden" name="client_id" value=<?php echo $client_id; ?>>
        <section class="form-buttons">
            <a href="/billing.php">
                <button type="button">
                    <?php echo getTranslation("back", $language_id); ?>
                </button>
            </a>
            <button type="submit" class="primary"><?php echo getTranslation("end-purchase", $language_id); ?></button>
        </section>
    </form>
</body>

</html>