<?php

require_once "models/baseModel.php";

class Category extends BaseModel {
    function getCategories($language_id){
        return $this->db->query("SELECT * FROM category_with_language WHERE language_id = $language_id");
    }
}