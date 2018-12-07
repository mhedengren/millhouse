<?php
//This function redirects to a specific page
/*
* Example:
* redirect_to('../views/register-form.php');
*/
function redirect_to($location){
    header('Location: ' .$location);
    exit; //exit() should be set if more action is set after this redirect.
}

//This function redirects if user is not logged in as an admin
/*
* Example:
* is_admin('register-form.php');
*/
function is_admin($location){
    if(!isset($_SESSION['user']) && !$_SESSION['user'] == "admin"){
        redirect_to($location);
    }
}

//This function displays error messages which are corrected in Class
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

function new_comment_form_check(){
    if(isset($_GET['empty'])){
        if($_GET['empty'] == 'content'){
            echo "<div class='alert alert-danger text-center' role='alert'>Please fill in comment box before posting.</div>";
        }
    } else if (isset($_GET['action'])) {
        if($_GET['action'] == 'added')
       echo "<div class='alert alert-success text-center' role='alert'>Your comment has been successfully added!</div>";
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
        return "<br>";
    }
}

