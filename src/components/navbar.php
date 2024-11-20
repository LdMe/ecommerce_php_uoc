<?php
require_once "./models/category.php";
require_once "./models/text.php";

function getNavbar( $language_id) {
    $categories = getCategories( $language_id );
    ob_start();
    ?>
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
                </a>
            </li>
        </ul>
    </nav>
    <?php
    $navbar = ob_get_clean();
    
    return $navbar;
}