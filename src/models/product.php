<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/models/baseModel.php";

class Product extends BaseModel
{
    

    public function getAll($language_id)
    {
        return $this->db->query("SELECT * FROM product_with_language WHERE language_id = ?", [$language_id]);
    }

    public function getById($id, $language_id=1)
    {
        return $this->db->query("SELECT * FROM product_with_language WHERE product_id =? AND language_id = ?", [$id, $language_id])[0];
    }

    public function getByIds($ids, $language_id)
    {
        $placeholders = str_repeat('?,', count($ids) - 1) . '?';
        $values = array_merge($ids, [$language_id]);
        return $this->db->query("SELECT * FROM product_with_language WHERE product_id IN ($placeholders) AND language_id = ?", $values);
    }

    public function getByName($name, $language_id)
    {
        return $this->db->query("SELECT * FROM product_with_language WHERE name LIKE '%?%' AND language_id = ?", [$name, $language_id]);
    }
    
    public function getByCategory($category_id, $language_id){
        return $this->db->query("SELECT product_with_language.* FROM product_has_category INNER JOIN product_with_language ON product_has_category.product_id = product_with_language.product_id WHERE category_id = ? AND language_id = ?", [$category_id, $language_id]);
    }

}
