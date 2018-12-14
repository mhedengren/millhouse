<?php
$errors = [];

//If sign-up btn is clicked activate Register class
if(isset($_POST['login'])){

    //Call a class
    $login = new Login($pdo);

    //Run class to store values in $args array to properties
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];
    $login->get_user_by_name($username);
    

    // Verify if password match password that is passed in
    if($login->verify_password($password)){

        //If there is no error add username and admin/standard in the session
        $login->add_session();
        
        //Redirect to login-form page
        redirect_to('../index.php');
        
    }else{

        //Store the error message
        $errors[] = "Password or username does not match.";

    }

    //Do not do anything if POST is not sent.
    
}

