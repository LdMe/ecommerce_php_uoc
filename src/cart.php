<?php
require_once "./models/cart.php";
require_once "./components/navbar.php";
require_once "./config/language.php";
require_once "./config/Database.php";
require_once "./models/product.php";
/*
<form action="/cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <input type="number" name="quantity" value="1">
        <button type="submit">Add to cart</button>
    </form>
    */
$product_id = $_POST['product_id'] ?? 0;
$quantity = $_POST['quantity'] ?? 0;
if ($product_id > 0 && $quantity > 0) {
    addToCart($product_id, $quantity);
    header("Location: /cart.php");
}

$cart = getCart();
$product_ids = array_keys($cart);
echo implode(",", $product_ids);
$products = getProductsByIds($product_ids, $language_id);
echo "<br>";
echo count($products);
foreach ($products as &$product) {
    $product['quantity'] = $cart[$product['product_id']];
}
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
    <h1>Cart</h1>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo $product['name']; ?> x <?php echo $product['quantity']; ?> <?php echo $product['price'] / 100; ?>€
            </li>
        <?php endforeach; ?>
    
</body>
</html>