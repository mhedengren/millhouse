<?php

class Register
{
    //Property for pdo    
    private $pdo;

    //Properties of inputting datas    
    public $username;
    public $email;
    protected $hashedPassword;
    public $passward;
    //public $confirm_password;
    public $errors = [];

    /*
    Inject the pdo connection so it is available inside of the class so we can call it with '$this->pdo', always available inside of the class
    */

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /*
    static private $pdo;

    static public function set_pdo($pdo)
    {
        self::$pdo = $pdo;
    }
    */


    public function args($args = [])
    {
        $this->username = $args['username'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        //$this->confirm_password = $args['confirm_password'] ?? '';
    }

    protected function set_hashed_password()
    {
        $this->hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
    }
    
    public function find_user(){

        //Prepare a SQL statement
        $statement = $this->pdo->prepare(
            "SELECT * FROM users WHERE username = :username");
        $statement->execute(
            [
                ':username'=>$this->username
            ]
        );

        //When select is used fetch must happen
        return $statement->fetch(); 
    }

    public function validate()
    {
        $this->errors =[];

        if(!preg_match('/[A-Z]/', $this->username)){
            $this->errors[] = "*Username must contain at least 1 uppercase letter.";
        }else{

        }

        if(strlen($this->email)<=6){
            $this->errors[] = "*Email address must contain 6 or more characters.";
        }

        if(!preg_match("/[0-9]/", $this->password)){
            $this->errors[] = "*Password must contain at least 1 number.";
        }
        
        if($this->find_user()["username"] == $this->username ){
            $this->errors[] = "*This username is already taken.";
        }

        return $this->errors;
    }

    /**
add () takes a product as an argument in the same way like when we use the $ _POST variable. 
We do not need return something from this feature then it only shall submit data to the database
*/
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

}