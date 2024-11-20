<?php

require_once "./config/Database.php";
require_once "./models/product.php";
require_once "./models/text.php";
require_once "./components/navbar.php";
require_once "./components/languageSelector.php";
require_once "./config/language.php";


$products = getProducts( $language_id );
$category_id = $_GET['category_id'] ?? 0;
if ($category_id > 0) {
    $products = getProductsByCategory($category_id,$language_id);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/styles.css">
</head>

<body>
    <?php echo getLanguageSelector( $language_id); ?>
    <h1>
        <?php echo getTranslation("main-page-title",$language_id); ?>
    </h1>
    <h2><?php echo getTranslation("product-category",$language_id); ?></h2>
    
    <?php echo getNavbar( $language_id); ?>
    <section class="product-list">
        <?php
        foreach ($products as $product) {
            ?>
            <article class='product-card'>
                <img src=<?php echo $product['image']; ?> class='product-image' alt=<?php echo $product['name']; ?>>
                <h2><?php echo $product['name']; ?></h2>
                <p><?php echo $product['description']; ?></p>
                <p><?php echo $product['price'] / 100; ?>€</p>
                <a href="/product.php?id=<?php echo $product['product_id']; ?>"><?php echo getTranslation("product-more-info",$language_id); ?></a>
            </article>
            <?php
        }
        ?>
    </section>
</body>

</html>