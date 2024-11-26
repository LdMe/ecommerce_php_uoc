<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/product.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/cart.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/config/utils.php";


$languageModel = new language();
$language_id = $languageModel->getSavedLanguage();
$id = $_GET['id'] ?? 0;
if ($id > 0) {
    $productModel = new Product();
    $product = $productModel->getById($id, $language_id);
} else {
    header('Location:/');
    exit();
}
$navbar = getNavbar($language_id);
$title = isset($product) ? $product["name"]:getTranslation("product-not-found", $language_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php echo $navbar; ?>
    <main>
        <?php
        if (!isset($product)) {
            ?>
            <h1>
                <?php 
                echo getTranslation("product-not-found", $language_id);
                 ?>
            </h1>
            <?php
            exit();
        }
        ?>
        <article class="product-view">
            <section class="product-image">
                <img src=<?php echo $product['image']; ?> class='product-image' alt=<?php echo $product['name']; ?>>
            </section>
            <section class="product-info">
                <h1>
                    <?php echo $product['name']; ?>
                </h1>
                <p>
                    <?php echo $product['description']; ?>
                </p>
                <p>
                    <?php echo formatPrice($product['price'] ); ?>€
                </p>
                <form class="product-form" action="/actions/add-product.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <input type="number" name="quantity" value="1" min="1">
                    <button class="primary"
                        type="submit"><?php echo getTranslation("cart-product-add", $language_id); ?></button>
                </form>
            </section>
        </article>
    </main>


</body>

</html>