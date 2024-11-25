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
        <link rel="stylesheet" href="/public/css/styles.css">
        <link rel="stylesheet" href="/public/css/navbar.css">
        <nav>
            <!-- Versión Desktop -->
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
                        <?php if ($totalProducts > 0) { ?>
                            <span class="badge">x<?php echo $totalProducts; ?></span>
                        <?php } ?>
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
                <?php } ?>
                <li>
                    <?php echo $searchBar; ?>
                </li>
            </ul>

            <!-- Versión Móvil -->
            <div class="navbar-mobile">
                <div class="navbar-top">
                    <div class="page-title">
                        <a href="/">
                            <?php echo getTranslation("main-page-title", $language_id); ?>
                        </a>
                    </div>
                    <div class="dropdown">
                        <button class="dropdown-toggle">
                            <span class="menu-icon">☰</span>
                        </button>
                        <ul class="dropdown-menu">
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
                                    <?php if ($totalProducts > 0) { ?>
                                        <span class="badge">x<?php echo $totalProducts; ?></span>
                                    <?php } ?>
                                </a>
                            </li>
                            <li>
                                <a href="/purchase-history.php">
                                    <?php echo getTranslation("my-purchases", $language_id); ?>
                                </a>
                            </li>
                            <li class="language-selector">
                                <?php echo getLanguageSelector($language_id); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navbar-bottom">
                    <div class="dropdown">
                        <button class="dropdown-toggle">
                            <?php echo getTranslation("product-category", $language_id); ?>
                        </button>
                        <ul class="dropdown-menu">
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
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="search-container">
                        <?php echo $searchBar; ?>
                    </div>
                </div>
            </div>
        </nav>
        <script src="/public/js/dropdown.js"></script>
    </header>
    <?php
    $navbar = ob_get_clean();

    return $navbar;
}