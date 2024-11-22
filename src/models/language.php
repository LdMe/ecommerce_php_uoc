<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/baseModel.php";

class Language extends BaseModel{

    public function getLanguages(){
        return $this->db->query("SELECT * FROM language");
    }
    public function setLanguage($language_id){
        setcookie('language_id', $language_id);
    }
    public function getSavedLanguage(){
        return $_COOKIE['language_id'] ?? 1;
    }
        
}


