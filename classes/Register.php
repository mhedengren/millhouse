<?php

class Register
{
    //Property for pdo    
    private $pdo;

    //Properties of inputting datas    
    private $username;
    private $email;
    private $hashedPassword;
    private $password;
    private $confirmPassword;
    private $hashedConfirmPassword;

    //Property for correcting error messages
    public $errors = [];

    
    //Inject the pdo connection so it is available inside of the class so we can call it with '$this->pdo', always available inside of the class
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /*
    I want to use static for args etc if i have time..
    
    static private $pdo;

    static public function set_pdo($pdo)
    {
        self::$pdo = $pdo;
    }
    */

    //Stor values in $args array to properties
    public function args($args = [])
    {
        $this->username = $args['username'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->confirmPassword = $args['confirm_password'] ?? '';  
    }

    //Encrypt password
    protected function set_hashed_password()
    {
        $this->hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
    }
    
    //Verify password to check if password and re-entered password matches
    public function verify_password($password){
        return password_verify($password, $this->hashedPassword);
    }
    
    //Collect user information from database (to check username duplication)
    public function find_user()
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM users WHERE username = :username");
        $statement->execute(
            [
                ':username'=>$this->username
            ]
        );

        return $statement->fetch(); 
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

        //Check if email contains 6 or less charactors
        if(strlen($this->email)<=6){
            $this->errors[] = "*Email address must contain more than 7 characters.";
        }
        
        //Check if password contains a number
        if(!preg_match("/[0-9]/", $this->password)){
            $this->errors[] = "*Password must contain at least 1 number.";
        }
        
        //Check if there is the same username existing in the database
        if($this->find_user()["username"] == $this->username ){
            $this->errors[] = "*This username is already taken.";
        }
        
        //Check if confirm_password can match with password
        if($this->password !== $this->confirmPassword){
            $this->errors[] = "*Password and confirm password must match.";
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
                ":admin" => 0 //true: admin, false:standarduser
            ]
        );

    }

}

class Login extends Register
{
        
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
        
        //Verify password to check if password matches with the one in the database
        public function verify_password($password)
        {
            return password_verify($password, $this->find_user()["password"]);
        }
}
