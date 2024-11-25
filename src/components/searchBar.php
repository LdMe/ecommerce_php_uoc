<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/language.php";

function getSearchBar( $language_id) {
    $languageModel = new Language() ;
    $language_id = $languageModel->getSavedLanguage();
    $query = $_GET['query'] ?? "";
    ob_start();
    ?>
    <form action="/products.php" method="GET">
        <input type="text" name="query" placeholder="<?php echo getTranslation("search", $language_id); ?>" value="<?php echo $query; ?>">
        <button type="submit"><?php echo getTranslation("search", $language_id); ?></button>
    </form>
    <?php
    $languageSelector = ob_get_clean();
    
    return $languageSelector;
}