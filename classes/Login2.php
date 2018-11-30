<?php

class Login extends Register
{
    //Property for pdo    
    private $pdo;

    //Properties of inputting datas    
    public $username;
    public $email;
    public $password;

    //Property for correcting error messages
    public $errors = [];

    //Stor values in $args array to properties
    public function args($args = [])
    {
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    //Run validations
    public function validate()
    {
        //Property to collect error/error messages
        $this->errors =[];

        //Check if user name does contains uppercase letters
        if(!preg_match('/[A-Z]/', $this->username)){
            $this->errors[] = "*Username must contain at least 1 uppercase letter.";
        }
        
        //Check if password contains a number
        if(!preg_match("/[0-9]/", $this->password)){
            $this->errors[] = "*Password must contain at least 1 number.";
        }
        
        //Check if there is the same username existing in the database
        if(!$this->find_user()["password"] == $this->password ){
            $this->errors[] = "*Passowrd or user name does not match.";
        }
        
        return $this->errors;
    }

    //Register user information in the database
    public function add_user()
    {
        $this->set_hashed_password();
        $statement = $this->pdo->prepare("
            INSERT INTO users (username, email, password, admin) 
            VALUES (:username, :email, :password, :admin)
            ");
        $statement->execute(
            [
                ":username" => $this->username,
                ":email" => $this->email,
                ":password" => $this->hashedPassword,
                ":admin" => true
            ]
        );

    }

    public function add_session()
    {
        $_SESSION["username"] = $this->find_user()["username"];
        $_SESSION["user_id"] = $this->find_user()["id"];
        if($this->find_user()["admin"] == true ){
            $_SESSION["user"] = "admin";
        } else{
            $_SESSION["user"] = "standard";

        }
    }
}