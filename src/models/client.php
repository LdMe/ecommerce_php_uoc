<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/models/baseModel.php";

class Client extends BaseModel
{
    private $cookieTime = 86400 * 30;
    public function registerClient($name, $email, $password, $confirmPassword,$old_client_id=null)
    {
        if(!$this->checkNonRegisteredClientInDb($old_client_id)){
            $old_client_id = null;
        }
        if ($password != $confirmPassword) {
            throw new Exception("passwords-dont-match");
        }
        if($this->emailExists($email)){
            throw new Exception("email-exists");
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if($old_client_id){
            $client_id = $old_client_id;
        }else{
            $this->db->execute("INSERT INTO client (client_id ) VALUES (NULL)");
            $client_id = $this->db->getLastInsertId();
        }
        $client_type_id = 1;
        $this->db->execute("INSERT INTO registered_client (client_id, name, email, password,client_type_id) VALUES (?,?,?,?,?)", [$client_id, $name, $email, $hash, $client_type_id]);
        return true;
    }
    public function createNonRegistered()
    {
        $this->db->execute("INSERT INTO client (client_id ) VALUES (NULL)");
        $client_id = $this->db->getLastInsertId();
        return $client_id;
    }
    public function emailExists($email)
    {
        $result = $this->db->query("SELECT * FROM registered_client WHERE email = ?", [$email]);
        return !empty($result);
    }
    public function loginRegistered($email, $password)
    {
        $client = $this->db->query("SELECT * FROM registered_client WHERE email = ?", [$email]);
        if (empty($client)) {
            throw new Exception("email-not-found");
        }
        $hash = $client[0]['password'];
        $isCorrect = password_verify($password, $hash);
        if ($isCorrect) {
            setCookie("client_id", $client[0]['client_id'], time() + $this->cookieTime, "/");
            return true;
        }
        throw new Exception("incorrect-credentials");
    }
    public function loginNonRegistered($client_id)
    {
        setCookie("client_id", $client_id, time() + $this->cookieTime, "/");
    }
    public function logout()
    {
        setcookie("client_id", "", time() - 3600, "/");
    }
    public function getLoggedInClient()
    {
        if (isset($_COOKIE['client_id'])) {
            $result = $this->db->query("SELECT * FROM registered_client WHERE client_id = ?", [$_COOKIE['client_id']]);
            if (empty($result)) {
                return null;
            }
            return $result[0];
        }
        return null;
    }
    public function getLoggedInClientId()
    {
        if (isset($_COOKIE['client_id'])) {
            return $_COOKIE['client_id'];
        }
        return null;
    }
    
    public function checkLoggedInClientInDb(){
        if (isset($_COOKIE['client_id'])) {
            $result = $this->db->query("SELECT * FROM registered_client WHERE client_id = ?", [$_COOKIE['client_id']]);
            if (empty($result)) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function checkNonRegisteredClientInDb($client_id){
        $result = $this->db->query("SELECT * FROM client WHERE client_id = ?", [$client_id]);
        if (empty($result)) {
            return false;
        }
        return true;
    }

}
