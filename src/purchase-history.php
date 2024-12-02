<?


require_once $_SERVER['DOCUMENT_ROOT'] . "/models/purchase.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";

$clientModel = new Client();
$client_id = $clientModel->getLoggedInClientId();
$purchaseModel = new Purchase();
$languageModel = new Language();
$language_id = $languageModel->getSavedLanguage();
$purchases = $purchaseModel->getPurchaseHistory($client_id, $language_id);
$navbar = getNavbar($language_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/public/img/favicon.ico">
    <title><?php echo getTranslation("purchase-history-title", $language_id); ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php
    echo $navbar;
    ?>
    <h1 class="centered">
        <?php echo getTranslation("purchase-history-title", $language_id); ?>
    </h1>

    <section class="purchase-list">
        <?php
        if (empty($purchases)) {
            echo getTranslation("no-purchases", $language_id);
        }
        foreach ($purchases as $purchase) { ?>
            <article class="purchase">
                <h2><?php echo getTranslation("purchase-title", $language_id); ?> <?php echo $purchase["purchase_id"]; ?></h2>
                <p><?php echo getTranslation("purchase-date", $language_id); ?>: <?php echo $purchase["created_at"]; ?></p>
                <h3><?php echo getTranslation("billing", $language_id) ?></h2>
                <table class="billing-data">
                    <tr>
                        <th><?php echo getTranslation("email", $language_id); ?></th>
                        <td><?php echo $purchase["billing_info"]['email']; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo getTranslation("address", $language_id); ?></th>
                        <td><?php echo $purchase["billing_info"]['address']; ?></td>
                    </tr>
                    <tr>
                        <th><?php echo getTranslation("phone", $language_id); ?></th>
                        <td><?php echo $purchase["billing_info"]['tel']; ?></td>
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

                    <?php foreach ($purchase["products"] as $product){ ?>
                        <tr class="cart-product-card">
                            <td>
                                <img class="cart-product-image" src=<?php echo $product['image']; ?> class='product-image'
                                    alt=<?php echo $product['name']; ?>>
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
                    <?php }; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b> <?php echo getTranslation("total", $language_id); ?></b></td>
                        <td>
                            <b><?php echo formatPrice($purchase["total"]); ?>€</b>
                        </td>

                    </tr>
                </table>
                
            </article>
        <?php } ?>
    </section>

</body>

</html>