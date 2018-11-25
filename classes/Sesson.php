<?php

class Session
{
    public $userName;
    public $admin;
        
    public function __construct()
    {
        session_start();
    }
        
    public function loginAsRegister($register)
    {
        if($register){
            $this->userName = $_SESSION['username'] = $register->username;
        }
        return true;
    }
        
}


?>