<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/cart.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/product.php";

$languageModel = new language();
$cart = new Cart();

$language_id = $languageModel->getSavedLanguage();

$products = $cart->getFormattedProducts($language_id);

$deleteMessage = getTranslation("cart-product-delete-confirm", $language_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/public/img/favicon.ico">
    <title><?php echo getTranslation("cart", $language_id); ?></title>

    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php echo getNavbar($language_id); ?>
    <main>
        <h1 class="centered"><?php echo getTranslation("cart", $language_id); ?></h1>
        <?php
        if (empty($products)) {
            echo getTranslation("cart-empty", $language_id);
            exit();
        }
        ?>
        <table class="cart-list">
            <tr>
                <th><?php echo getTranslation("image", $language_id); ?></th>
                <th><?php echo getTranslation("name", $language_id); ?></th>
                <th><?php echo getTranslation("quantity", $language_id); ?></th>
                <th><?php echo getTranslation("price", $language_id); ?></th>
                <th><?php echo getTranslation("total", $language_id); ?></th>
                <th><?php echo getTranslation("actions", $language_id); ?></th>
            </tr>

            <?php foreach ($products as $product) { ?>
                <tr class="cart-product-card">
                    <td>
                        <img class="cart-product-image" src=<?php echo $product['image']; ?> class='product-image' alt=<?php echo $product['name']; ?>>
                    </td>
                    <td>
                        <?php echo $product['name']; ?>
                    </td>
                    <td>
                        <form action="/actions/change-product-quantity.php" method="POST">
                            <input type="hidden" name="product_id" value=<?php echo $product['product_id']; ?>>
                            <input type="number" name="quantity" value=<?php echo $product['quantity']; ?> min="1"
                                onChange="this.form.submit()">
                            <!-- <button type="submit"><?php echo getTranslation("cart-product-save-quantity", $language_id); ?></button> -->
                        </form>
                    </td>
                    <td>
                        <?php echo formatPrice($product['price']); ?>€
                    </td>
                    <td>
                        <?php echo formatPrice($product['totalPrice']); ?>€
                    </td>
                    <td>
                        <form action="/actions/delete-product.php" method="POST">
                            <input type="hidden" name="product_id" value=<?php echo $product['product_id']; ?>>
                            <button type="submit" class="danger"
                                onclick="return confirm('<?php echo $deleteMessage; ?>')"><?php echo getTranslation("cart-product-delete", $language_id); ?></button>
                        </form>
                    </td>
                </tr>
            <?php }
            ; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <b>
                        <?php echo getTranslation("total", $language_id); ?>
                    </b>
                </td>
                <td>
                    <b>
                        <?php echo formatPrice($cart->getTotal());?>€
                    </b>
                </td>
                <td>
                    <?php if (!empty($products)) { ?>
                        <form class="cart-buy-form" action="/billing.php" method="POST">
                            <button type="submit" class="checkout-button primary">
                                <?php echo getTranslation("buy", $language_id); ?>
                            </button>
                        </form>
                    <?php } ?>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>