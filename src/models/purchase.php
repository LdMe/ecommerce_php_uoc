<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/baseModel.php";

class Purchase extends BaseModel
{

    public function create($client_id, $billing_id, $cart)
    {
        $purchase_status_id = 1;
        $this->db->execute("INSERT INTO purchase (client_id,billing_info_id,purchase_status_id) VALUES (?,?,?)", [$client_id, $billing_id, $purchase_status_id]);
        $purchase_id = $this->db->getLastInsertId();
        $placeholders = "(?,?,?)";
        $arrayPlaceHolders = [];
        foreach ($cart as $item) {
            $arrayPlaceHolders[] = $placeholders;
        }
        $totalPlaceHolders = implode(", ", $arrayPlaceHolders);
        $values = [];
        foreach ($cart as $product_id => $quantity) {
            $values[] = $purchase_id;
            $values[] = $product_id;
            $values[] = $quantity;
        }
        $this->db->execute("INSERT INTO purchase_has_product (purchase_id,product_id,quantity) VALUES $totalPlaceHolders", $values);
        return $purchase_id;
    }

    public function getPurchaseHistory($client_id,$language_id)
    {
        $query = "SELECT * 
                from purchase
                JOIN purchase_has_product as php ON php.purchase_id=purchase.purchase_id
                JOIN product ON product.product_id=php.product_id
                JOIN billing_info ON billing_info.billing_info_id=purchase.billing_info_id
                JOIN product_has_language as phl ON phl.product_id=product.product_id
                WHERE purchase.client_id=? AND phl.language_id=?
                ORDER BY purchase.created_at DESC;";
        $result = $this->db->query($query, [$client_id, $language_id]);
        return $this->formatPuchases($result);
    }
    private function formatPuchases($purchases){
        $result = [];
        foreach($purchases as $purchase){
            if(!array_key_exists($purchase["purchase_id"], $result)){
                $billing_info= [
                    "address" => $purchase["address"],
                    "email" => $purchase["email"],
                    "tel" => $purchase["tel"]
                ];
                $result[$purchase["purchase_id"]] = [
                    "purchase_id" => $purchase["purchase_id"],
                    "client_id" => $purchase["client_id"],
                    "created_at" => $purchase["created_at"],
                    "billing_info" => $billing_info,
                    "products" => []
                ];
            }
            $result[$purchase["purchase_id"]]["products"][] = [
                "product_id"=> $purchase["product_id"],
                "price" => $purchase["price"],
                "quantity" => $purchase["quantity"],
                "name" => $purchase["name"],
                "description" => $purchase["description"],
                "image" => $purchase["image"]
            ];
        }
        return $result;
    }
}