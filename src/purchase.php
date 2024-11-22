<?

require_once "models/client.php";
require_once "models/billing.php";
require_once "models/cart.php";
require_once "models/text.php";
require_once "config/language.php";
require_once "models/product.php";
require_once "components/navbar.php";

$languageModel = new Language();
$language_id = $languageModel->getSavedLanguage();
$navbar = getNavbar($language_id);
$clientModel = new Client();
$client = $clientModel->getLoggedInClient();
$client_id = empty($client) ? $clientModel->getLoggedInClientId() : $client['client_id'];
if (!isset($client_id)) {
    header("Location: /");
}

$cart = new Cart();
$billingModel = new Billing();
$billing = $billingModel->getLastByClient($client_id);
if (empty($billing)) {
    header("Location: /billing.php");
}
$products = $cart->getFormattedProducts($language_id);
$labels = [
    "email" => getTranslation(text_id: "email", $language_id),
    "address" => getTranslation("address", $language_id),
    "phone" => getTranslation("phone", $language_id)
];


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

        <?php foreach ($products as $product): ?>
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
                    <?php echo $product['price']; ?>€
                </td>
                <td>
                    <?php echo $product['totalPrice']; ?>€
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td> <?php echo getTranslation("total", $language_id); ?></td>
            <td>
                <?php echo $cart->getTotal() ?>€
            </td>
            
        </tr>
    </table>
    <form action="/actions/purchase.php" method="POST">
        <input type="hidden" name="client_id" value=<?php echo $client_id; ?>>
        <button type="submit"><?php echo getTranslation("purchase", $language_id); ?></button>
</body>

</html>