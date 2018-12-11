<?php
//If sign-up btn is clicked activate Register class
if(isset($_POST['signup'])){
    
    //Stor all input which are sent by POST into $args array
    $args = $_POST['register'];
    
    //Call a class
    $register = new Register($pdo);
    
    //Run class to stor values in $args array to properties
    $register->args($args);
    
    //Run validation and collect resut of validation and error messages into error property
    $register->validate();

    //Check if there is any error messages
    if(empty($register->errors)){
    
        //If there is no error add user information to database
        $register->add_user();

        //Redirect to login-form page
        redirect_to('login-form.php');
    }

    //Do not do anything if POST is not sent.
}
