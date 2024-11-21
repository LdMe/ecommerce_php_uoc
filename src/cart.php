<?php
require_once "./models/cart.php";
require_once "./components/navbar.php";
require_once "./config/language.php";
require_once "./config/Database.php";
require_once "./models/product.php";

$product_id = $_POST['product_id'] ?? 0;
$quantity = $_POST['quantity'] ?? 0;
if ($product_id > 0 && $quantity > 0) {
    addToCart($product_id, $quantity);
    header("Location: /cart.php");
}

$cart = getCart();
$products = formatProducts($cart,$language_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo getNavbar( $language_id); ?>
    <h1><?php getTranslation("cart",$language_id);?></h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product['name']; ?> x <?php echo $product['quantity']; ?> <?php echo $product['price'] / 100; ?>€ -> <?php echo $product['price'] / 100 * $product['quantity'];?>€
                <form action="/" method="POST">
                    <input type="hidden" name="product_id" value=<?php echo $product['product_id']; ?>>
                    <input type="number" name="quantity" value=<?php echo $product['quantity']; ?>>
                    <button type="submit"><?php echo getTranslation("cart-add-more", $language_id); ?></button>
                </form>
                <form action="/" method="POST">
                    <input type="hidden" name="product_id" value=<?php echo $product['product_id']; ?>>
                    <button type="submit"><?php echo getTranslation("delete", $language_id); ?></button>
                </form>
            </li>
        <?php endforeach; ?>
    
</body>
</html>