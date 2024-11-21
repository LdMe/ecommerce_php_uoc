<?php

function createBilling($address, $email, $tel, $client_id) {
    $db = new \App\Config\Database();
    $db->execute("INSERT INTO billing_info (address, email, tel, client_id) VALUES (?,?,?,?)", [$address, $email, $tel, $client_id]);
}

function getBilling($client_id) {
    $db = new \App\Config\Database();
    $result = $db->query("SELECT * FROM billing_info WHERE client_id = ?", [$client_id]);
    return $result;
}

function getLastBilling($client_id) {
    $db = new \App\Config\Database();
    $result = $db->query("SELECT * FROM billing_info WHERE client_id = ? ORDER BY billing_info_id DESC LIMIT 1", [$client_id]);
    if(empty($result)){
        return null;
    }
    return $result[0];
}