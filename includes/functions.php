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
        $output .= "<div class=\"errors\">";
        $output .= "<ul>";
        foreach($errors as $error){
            $output .= "<li>" .$error . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}


/*This function checks if the admin has filled in 
  the inputs field in the add new post form */
function new_post_form_check() {

 if(isset($_GET['empty'])) {   
    if($_GET['empty'] == 'title') {
        echo "<div class='alert alert-danger text-center' role='alert'>Please insert the title!</div>";
    } else if($_GET['empty'] == 'description') {
        echo "<div class='alert alert-danger text-center' role='alert'>Please insert the description!</div>";
    } else if($_GET['empty'] == 'content') {
        echo "<div class='alert alert-danger text-center' role='alert'>Please insert the content!</div>";
    } else if($_GET['empty'] == 'form') {
        echo "<div class='alert alert-danger text-center' role='alert'>You did not fill in all fields! </div>";
    } 
 } else if (isset($_GET['action'])) {
     if($_GET['action'] == 'added')
    echo "<div class='alert alert-success text-center' role='alert'>Your post has been successfully added!</div>";
 }
}

function upload_file_check() {
    if(isset($_GET['upload'])) {
        if($_GET['upload'] == 'wrongformat') {
            echo "<div class='alert alert-warning text-center' role='alert'>Fil extension not allowed, please choose a JPEG, JPG or PNG file.</div>";
        } else if($_GET['upload'] == 'empty') {
            echo "<div class='alert alert-warning text-center' role='alert'>Please choose an image to upload.</div>";
        }
    }
} 

function insert_line_break($text){
    if (strlen($text) < 10 ) {
        echo "<br>";
    }
}

?>