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
</head>
<body>
    <?php echo $navbar; ?>
    <h1>
        <?php echo getTranslation("main-page-title", $language_id); ?>
    </h1>
    <?php if(!empty($client)){ ?>
    <p>
        <?php echo getTranslation("greeting", $language_id); ?>, <?php echo $client['name']; ?>!
    </p>
    <?php } ?>
    <p>
        <?php echo getTranslation("main-page-intro", $language_id); ?>
    </p>
    <ul>
        <?php foreach ($categories as $category) { ?>
            <li>
                <a href="/products.php?category_id=<?php echo $category['category_id']; ?>">
                    <?php echo $category['name']; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>