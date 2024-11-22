<?php


function registerClient($name, $email, $password, $confirmPassword)
{
    if ($password != $confirmPassword) {
        return false;
    }
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $db = new \App\Config\Database();
    $db->execute("INSERT INTO client (client_id ) VALUES (NULL)");
    $client_id = $db->getLastInsertId();
    $client_type_id = 1;
    $db->execute("INSERT INTO registered_client (client_id, name, email, password,client_type_id) VALUES (?,?,?,?,?)", [$client_id, $name, $email, $hash, $client_type_id]);
    return true;
}
function createNonRegisteredClient()
{
    $db = new \App\Config\Database();
    $db->execute("INSERT INTO client (client_id ) VALUES (NULL)");
    $client_id = $db->getLastInsertId();
    return $client_id;
}

function clientExists($email)
{
    $db = new \App\Config\Database();
    $result = $db->query("SELECT * FROM registered_client WHERE email = ?", [$email]);
    return !empty($result);
}

function loginClient($email, $password)
{
    $db = new \App\Config\Database();
    $result = $db->query("SELECT * FROM registered_client WHERE email = ?", [$email]);
    if (empty($result)) {
        return false;
    }
    $hash = $result[0]['password'];
    $isCorrect = password_verify($password, $hash);
    if ($isCorrect) {
        setCookie("client_id", $result[0]['client_id'], time() + (86400 * 30), "/");
        return true;
    }
    return false;
}
function loginNonRegisteredClient($client_id)
{
    setCookie("client_id", $client_id, time() + (86400 * 30), "/");
}

function logoutClient()
{
    setcookie("client_id", "", time() - 3600, "/");
}

function getLoggedInClient()
{
    if (isset($_COOKIE['client_id'])) {
        $db = new \App\Config\Database();
        $result = $db->query("SELECT * FROM registered_client WHERE client_id = ?", [$_COOKIE['client_id']]);
        if (empty($result)) {
            return null;
        }
        return $result[0];
    }
    return null;
}
function getClientId()
{
    if (isset($_COOKIE['client_id'])) {
        return $_COOKIE['client_id'];
    }
    return null;
}