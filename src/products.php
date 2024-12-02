<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/product.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/text.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/components/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/components/languageSelector.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/client.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/config/utils.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/client.php";

$productModel = new Product() ;
$clientModel = new Client();
$languageModel = new Language();
$categoryModel = new Category();

$language_id = $languageModel->getSavedLanguage();
$products = $productModel->getAll( $language_id );
$category_id = $_GET['category_id'] ?? 0;
$query = $_GET['query'] ?? "";
if($query != "") {
    $products = $productModel->getByName($query, $language_id);
}else if ($category_id > 0) {
    $category = $categoryModel->getById( $category_id, $language_id );
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
    <link rel="icon" type="image/x-icon" href="/public/img/favicon.ico">
    <title><?php echo getTranslation("main-page-title", $language_id); ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php echo $navbar; ?>
    
    <h1 class="centered"><?php 
    echo isset($category) ?  $category['name']:  "";
    ?></h1>
    <section class="product-list">
        <?php
        foreach ($products as $product) {
            ?>
            <article class='product-card'>
                <img src=<?php echo $product['image']; ?> class='product-image' alt=<?php echo $product['name']; ?>>
                <section class="product-info">
                    <h2><?php echo $product['name']; ?></h2>
                    <p><?php echo $product['description']; ?></p>
                    <p><?php echo formatPrice($product['price']); ?>€</p>
                    <section class="link-container centered">
                    <a  href="/product.php?id=<?php echo $product['product_id']; ?>"><?php echo getTranslation("product-more-info",$language_id); ?></a>
                    </section>
                </section>
            </article>
            <?php
        }
        ?>
    </section>
</body>

</html>