<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/client.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/language.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/category.php";

$clientModel = new Client();
$languageModel = new Language();
$categoryModel = new Category();

$client = $clientModel->getLoggedInClient();
$language_id = $languageModel->getSavedLanguage();
$categories = $categoryModel->getCategories($language_id);
$navbar = getNavbar($language_id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo getTranslation("main-page-title", $language_id); ?></title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>

<body>
    <?php echo $navbar; ?>
    <main class="home">
        <section class="page-intro w-50">
            <h1 class="centered">
                <?php echo getTranslation("main-page-title", $language_id); ?>
            </h1>
            <p class="centered">
                <?php echo getTranslation("main-page-description", $language_id); ?>
            </p>
            <img class="intro-image" src="/public/img/home.jpg"
                alt="<?php echo getTranslation("main-page-title", $language_id); ?>">
            <?php if (!empty($client)) { ?>
                <p class="centered">
                    <?php echo getTranslation("greeting", $language_id); ?>, <?php echo $client['name']; ?>!
                </p>
            <?php } ?>

        </section>
        <section class="categories w-50">
            <h2 class="centered"><?php echo getTranslation("product-category", $language_id); ?></h2>
            <section class="category-list">
                <?php foreach ($categories as $category) { ?>
                    <article class="category-card">
                        <a href="/products.php?category_id=<?php echo $category['category_id']; ?>">
                            <section class="category-image">
                                <img src="/public/img/categories/<?php echo $category['category_id']; ?>.jpg">
                            </section>
                            <section class="category-info">
                                <h2>
                                    <?php echo $category['name']; ?>
                                </h2>
                                <p>
                                    <?php echo $category['description']; ?>
                                </p>
                            </section>

                        </a>
                    </article>

                <?php } ?>
            </section>
        </section>
    </main>
</body>

</html>