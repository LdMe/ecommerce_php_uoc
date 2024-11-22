<?php

require_once "models/baseModel.php";

class Billing extends BaseModel
{
    public function create($address, $email, $tel, $client_id)
    {
        $this->db->execute("INSERT INTO billing_info (address, email, tel, client_id) VALUES (?,?,?,?)", [$address, $email, $tel, $client_id]);
    }
    public function getByClient($client_id)
    {
        return $this->db->query("SELECT * FROM billing_info WHERE client_id = ?", [$client_id]);
    }
    public function getLastByClient($client_id)
    {
        $result = $this->db->query("SELECT * FROM billing_info WHERE client_id = ? ORDER BY billing_info_id DESC LIMIT 1", [$client_id]);
        if (empty($result)) {
            return null;
        }
        return $result[0];
    }
}