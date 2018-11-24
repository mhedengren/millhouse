<?php

class Register
{
    private $pdo;
    
    function __construct($pdo)
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

    //Properties of inputting datas    
    public $username;
    public $email;
    protected $hashed_password;
    public $passward;
    //public $confirm_password;


    /* Inject the pdo connection so it is available inside of the class
   * so we can call it with '$this->pdo', always available inside of the class
   */
    /*
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    */

    
    public function args($args = [])
    {
        //$this->pdo = $pdo;

        $this->username = $args['username'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        //$this->confirm_password = $args['confirm_password'] ?? '';
    }

    protected function set_hashed_password()
    {
        $this->hashed_password = password_hash($this->password, PASSWORD_DEFAULT);
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
                ":password" => $this->hashed_password,
                ":admin" => true
            ]
        );
    }
}