<?php


include '../classes/Register.php';
include 'database-connection.php';
include_once 'functions.php';

$args = $_POST['register'];
$register = new Register($pdo);
$register->args($args);
$register->validate();

if(empty($register->errors)){
    echo "yes";
    $register->add_user();

    echo var_dump($register)."<br><br>";

    $statement = $pdo->prepare("SELECT * FROM users");
    $statement->execute();
    $connection_check = $statement->fetchAll(PDO::FETCH_ASSOC);


    echo var_dump($connection_check);

}else{
    //$register->errors;
    var_dump($register->errors);
    //echo display_errors($register->errors);
    //redirect_to('../views/register-form.php');
}



//require_once('../views/register-form.php');
/*
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

echo $username, $email, $password;
*/
/* Pass along the $pdo variable when you create a new instance
 * of the class, $pdo becomes $this->pdo. $posts is used
 * to call the specific methods inside of the Posts class
 * 
$posts = new Register($pdo);

$args = $_POST['admin'];
$register = new Register($args);
$admin->set_hashed_password();
$admin->add_user($users);
//$result = $admin->save();

*/
