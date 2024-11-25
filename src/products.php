<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/product.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/text.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/components/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/components/languageSelector.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/client.php";

$productModel = new Product() ;
$clientModel = new Client();
$languageModel = new Language();
$language_id = $languageModel->getSavedLanguage();
$products = $productModel->getAll( $language_id );
$category_id = $_GET['category_id'] ?? 0;
$query = $_GET['query'] ?? "";
if($query != "") {
    $products = $productModel->getByName($query, $language_id);
}else if ($category_id > 0) {
    $products = $productModel->getByCategory($category_id,$language_id);
}
$navbar = getNavbar( $language_id);
$client = $clientModel->getLoggedInClient();
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
    
    
    <section class="product-list">
        <?php
        foreach ($products as $product) {
            ?>
            <article class='product-card'>
                <img src=<?php echo $product['image']; ?> class='product-image' alt=<?php echo $product['name']; ?>>
                <section class="product-info">
                    <h2><?php echo $product['name']; ?></h2>
                    <p><?php echo $product['description']; ?></p>
                    <p><?php echo $product['price'] / 100; ?>€</p>
                    <a href="/product.php?id=<?php echo $product['product_id']; ?>"><?php echo getTranslation("product-more-info",$language_id); ?></a>
                </section>
            </article>
            <?php
        }
        ?>
    </section>
</body>

</html>