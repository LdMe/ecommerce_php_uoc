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
    <title>Document</title>
</head>

<body>
    <?php
    echo $navbar;
    ?>
    <h1>
        <?php echo getTranslation("purchase-history-title", $language_id); ?>
    </h1>

    <?php
    if(empty($purchases)) {
        echo getTranslation("no-purchases", $language_id);
    }
    foreach ($purchases as $purchase) { ?>
        <article class="purchase">
            <p><?php echo $purchase['purchase_id']; ?></p>
            <p> <?php echo $purchase['created_at']; ?> </p>
            <p> <?php echo $purchase['billing_info']['address']; ?> </p>
            <p> <?php echo $purchase['billing_info']['email']; ?> </p>
            <p> <?php echo $purchase['billing_info']['tel']; ?> </p>
            <section class="purchase-products">
                <?php foreach ($purchase['products'] as $product) { ?>
                    <article class="purchase-product">
                        <img src=<?php echo $product['image']; ?> class='product-image' alt=<?php echo $product['name']; ?>>
                        <p> <?php echo $product['name']; ?> </p>
                        <p> <?php echo $product['description']; ?> </p>
                        <p> <?php echo $product['quantity']; ?> </p>
                        <p> <?php echo $product['price'] / 100; ?>€ </p>
                    </article>
                <?php } ?>
            </section>
        </article>
    <?php } ?>
</body>

</html>