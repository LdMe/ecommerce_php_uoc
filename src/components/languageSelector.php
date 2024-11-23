<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/language.php";

function getLanguageSelector( $language_id) {
    $languageModel = new Language() ;
    $languages =$languageModel->getLanguages();
    ob_start();
    ?>
    <form action="/actions/change-language.php" method="POST">
        <label for="language_id"><?php echo getTranslation("language", $language_id); ?></label>
        <select name="language_id" onChange="this.form.submit()">
            <?php foreach ($languages as $language){ ?>
                <option value="<?php echo $language['language_id']; ?>" <?php echo $language_id == $language['language_id'] ? "selected": ""; ?>><?php echo $language['name']; ?></option>
            <?php }; ?>
            
        </select>
    </form>
    <?php
    $languageSelector = ob_get_clean();
    
    return $languageSelector;
}