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
    $client_id = $clientModel->getLoggedInClientId();
    $searchBar = getSearchBar($language_id);
    ob_start();
    ?>
    <link rel="stylesheet" href="/public/styles.css">
    <nav>
        <ul class="navbar-actions">
            <li>
                <a href="/">
                    <?php echo getTranslation("main-page-title", $language_id); ?>
                </a>
            </li>
            <li>
                <?php echo getLanguageSelector($language_id); ?>
            </li>
            <?php if (!isset($client_id)) { ?>
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
                    <span class="badge">x<?php echo $totalProducts; ?></span>
                </a>
            </li>
            <li>
                <a href="/purchase-history.php">
                    <?php echo getTranslation("my-purchases", $language_id); ?>
                </a>
            </li>
        </ul>

        <ul class="navbar-categories">
            <li>
                <a href="/?category_id=0">
                    <?php echo getTranslation("category-all", $language_id); ?>
                </a>
            </li>
            <?php foreach ($categories as $category): ?>
                <li>
                    <a href="/?category_id=<?php echo $category['category_id']; ?>">
                        <?php echo $category['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>

            <li>
                <?php echo $searchBar; ?>
            </li>
        </ul>
    </nav>
    <?php
    $navbar = ob_get_clean();

    return $navbar;
}