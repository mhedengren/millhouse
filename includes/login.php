<?php


include '../classes/Register.php';
include 'database-connection.php';
include_once 'functions.php';

$errors = [];


//If sign-up btn is clicked activate Register class
if(isset($_POST['login'])){
    //Call a class
    $login = new Login($pdo);
    //Run class to stor values in $args array to properties
    
    $login->username = $_POST['login_username'];
    $password = $_POST['login_password'];
    $login->find_user();
    $login->verify_password($password);


    if($login->verify_password($password)){

        //If there is no error add username and admin/standart in the session
        $login->add_session();
        
        //Redirect to login-form page
        redirect_to('../index.php');
        
    }else{
        $errors[] = "Password or username does not match.";
    }

//Do not do anything if POST is not sent.
}

