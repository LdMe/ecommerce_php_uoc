<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/models/baseModel.php";

class Billing extends BaseModel
{
    public function create($address, $email, $tel, $client_id)
    {
        if ($this->exists($address, $email, $tel, $client_id)) {
            return;
        }
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
    public function exists($address, $email, $tel, $client_id)
    {
        $billings = $this->getByClient($client_id);
        if (empty($billings)) {
            return false;
        }
        $result = false;
        foreach ($billings as $billing) {
            if ($billing["address"] == $address && $billing["email"] == $email && $billing["tel"] == $tel && $billing["client_id"] == $client_id) {
                $result = true;
                break;
            }
        }
        return $result;
    }
    public function getDefaultBillingDetails($client_id)
    {
        $values = [
            "email" => "",
            "address" => "",
            "phone" => "",
            "client_id" => ""
        ];
        $billings = null;
        if (isset($client_id)) {
            $lastBilling = $this->getLastByClient($client_id);
            $values = [
                "email" => $lastBilling['email'] ?? "",
                "address" => $lastBilling['address'] ?? "",
                "phone" => $lastBilling['tel'] ?? "",
                "client_id" => $lastBilling['client_id'] ?? ""
            ];
            $billings = $this->getByClient($client_id);
        }
        return [
            "values" => $values,
            "billings" => $billings
        ];
    }
    public function delete($billing_info_id)
    {
        $this->db->execute('DELETE FROM billing_info WHERE billing_info_id = ?', [$billing_info_id]);
    }
}