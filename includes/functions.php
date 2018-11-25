<?php
//Redirect
/*
* Example:
* redirect_to('../views/register-form.php');
*/
function redirect_to($location){
    header('Location: ' .$location);
    exit; //exit() should be set if more action is set after this redirect.
}

//Redirect if user is not logged in
function is_login($location){
    if(!isset($_SESSION['username'])){
        redirect_to($location);
    }
}

//To display error messages which is corrected in Class
function display_errors($errors = array()){
    $output = '';
    if(!empty($errors)){
        $output .= "<div class\"errors\">";
        $output .= "<ul>";
        foreach($errors as $error){
            $output .= "<li>" .$error . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

?>