<?php

require "./config/Database.php";
require "./models/product.php";
require_once "./components/navbar.php";
require_once "./config/language.php";
require_once "./models/cart.php";

$id = $_GET['id'] ?? 0;
if ($id > 0) {
    $product = getProductById($id, $language_id);
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
    <h1>
        <?php echo $product['name']; ?>
    </h1>
    <p>
        <?php echo $product['description']; ?>
    </p>
    <p>
        <?php echo $product['price'] / 100; ?>€
    </p>
    <img src=<?php echo $product['image']; ?> class='product-image' alt=<?php echo $product['name']; ?>>    
    <form action="/cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <input type="number" name="quantity" value="1">
        <button type="submit">Add to cart</button>
    </form>

    
</body>
</html>