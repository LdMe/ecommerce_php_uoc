<?php
require_once "./models/language.php";

function getLanguageSelector( $language_id) {
    $languageModel = new Language() ;
    $languages =$languageModel->getLanguages();
    ob_start();
    ?>
    <form action="/" method="GET">
        <select name="language_id" onChange="this.form.submit()">
            <?php foreach ($languages as $language): ?>
                <option value="<?php echo $language['language_id']; ?>" <?php echo $language_id == $language['language_id'] ? "selected": ""; ?>><?php echo $language['name']; ?></option>
            <?php endforeach; ?>
            
        </select>
    </form>
    <?php
    $languageSelector = ob_get_clean();
    
    return $languageSelector;
}