<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/category.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/text.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/cart.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/languageSelector.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/searchBar.php";

function getNavbar($language_id)
{
    $categoryModel = new Category();
    $cartModel = new Cart();
    $clientModel = new Client();
    $categories = $categoryModel->getCategories($language_id);
    $totalProducts = $cartModel->getTotalProducts();
    $client = $clientModel->getLoggedInClient();
    $searchBar = getSearchBar($language_id);
    ob_start();
    ?>
    <header>
        <link rel="stylesheet" href="/public/styles.css">
        <nav>
            <ul class="navbar-actions">
                <li class="page-title">
                    <a href="/">
                        <?php echo getTranslation("main-page-title", $language_id); ?>
                    </a>
                </li>

                <?php if (!isset($client)) { ?>
                    <li>
                        <a href="/login.php">
                            <?php echo getTranslation("login", $language_id); ?>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="/actions/logout.php">
                            <?php echo getTranslation("logout", $language_id); ?>
                        </a>
                    </li>
                <?php } ?>
                <li>
                    <a href="/cart.php">
                        <?php echo getTranslation("cart", $language_id); ?>
                        <?php if ($totalProducts > 0) {
                            ?>
                            <span class="badge">x<?php echo $totalProducts; ?></span>
                            <?php
                        }
                        ?>
                    </a>
                </li>
                <li>
                    <a href="/purchase-history.php">
                        <?php echo getTranslation("my-purchases", $language_id); ?>
                    </a>
                </li>
                <li>
                    <?php echo getLanguageSelector($language_id); ?>
                </li>
            </ul>

            <ul class="navbar-categories">
                <li>
                    <a href="/products.php?category_id=0">
                        <?php echo getTranslation("category-all", $language_id); ?>
                    </a>
                </li>
                <?php foreach ($categories as $category) { ?>
                    <li>
                        <a href="/products.php?category_id=<?php echo $category['category_id']; ?>">
                            <?php echo $category['name']; ?>
                        </a>
                    </li>
                <?php }
                ; ?>

                <li>
                    <?php echo $searchBar; ?>
                </li>
            </ul>
        </nav>
    </header>
    <?php
    $navbar = ob_get_clean();

    return $navbar;
}