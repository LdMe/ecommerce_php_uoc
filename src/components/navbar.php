<?php
require_once "models/category.php";
require_once "models/text.php";
require_once "models/cart.php";

function getNavbar( $language_id) {
    $categoryModel = new Category();
    $categories = $categoryModel->getCategories( $language_id );
    $cart = new Cart(  );
    $totalProducts = $cart->getTotalProducts( );
    ob_start();
    ?>
    <link rel="stylesheet" href="/public/styles.css">
    <nav>
        <ul>
            <li>
                <a href="/?category_id=0&language_id=<?php echo $language_id; ?>">
                    <?php echo getTranslation("category-all", $language_id); ?>
                </a>
            </li>
            <?php foreach ($categories as $category): ?>
                <li>
                    <a href="/?category_id=<?php echo $category['category_id']; ?>&language_id=<?php echo $language_id; ?>">
                        <?php echo $category['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <li>
                <a href="/cart.php">
                    <?php echo getTranslation("cart", $language_id); ?>
                    <span class="badge">x<?php echo $totalProducts; ?></span>
                </a>
            </li>
        </ul>
    </nav>
    <?php
    $navbar = ob_get_clean();
    
    return $navbar;
}