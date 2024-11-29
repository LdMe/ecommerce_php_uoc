<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/baseModel.php";

class Category extends BaseModel
{
    function getCategories($language_id)
    {
        return $this->db->query("SELECT * FROM category_with_language WHERE language_id = $language_id");
    }
    function getById($category_id, $language_id)
    {
        $result = $this->db->query("SELECT * FROM category_with_language WHERE category_id = $category_id AND language_id = $language_id");
        if (count($result) > 0){
            return $result[0];
        }
        return null;
    }
}