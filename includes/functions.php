<?php
//This function redirects to a specific page
function redirect_to($location){
    
    header('Location: ' .$location);
    exit; //exit() should be set if more action is set after this redirect.
}

//This function redirect if user is not logged in
function is_login($location){

    if(!isset($_SESSION['username'])){
        redirect_to($location);
    }
}

//This function redirects if user is not logged in as an admin
function is_admin($location){

    if((!isset($_SESSION['user'])) || $_SESSION['user'] == "standard"){
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
    } 
    if(isset($_GET['action'])) {
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

function create_validation(){
      //Check if the user has uploaded an image
      if (!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        header('Location: ../views/admin-page.php?upload=empty');
        exit(); 
     } else if(isset($_FILES['image'])){
        $errors= array();
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        $formats = array("jpeg","jpg","png");
        
        //Checking the file format of the uploaded file
        if(in_array($file_ext,$formats) === false) {
        header('Location: ../views/admin-page.php?upload=wrongformat');
        exit();
        }
     } 

     //Check if the text inputs are empty
     if(empty($_POST["postTitle"]) && empty($_POST["postDesc"]) && empty($_POST["postCont"])) {
     header('Location: ../views/admin-page.php?empty=form');
     exit();
     }

     if(empty($_POST["postTitle"])) {
        header('Location: ../views/admin-page.php?empty=title');
        exit();
     } else if (empty($_POST["postDesc"])) {
        header('Location: ../views/admin-page.php?empty=description');
        exit();
     } else if (empty($_POST["postCont"])) {
        header('Location: ../views/admin-page.php?empty=content');
        exit();
     }

}

function update_validation(){
        //Check if the user has uploaded an image
        if (!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
         
            header('Location: ../views/edit-post.php?id='.$_GET["id"].'&upload=empty');
            exit(); 
         } else if(isset($_FILES['image'])){
            $errors= array();
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            $formats = array("jpeg","jpg","png");
            
            //Checking the file format of the uploaded file
            if(in_array($file_ext,$formats) === false) {
            header('Location: ../views/edit-post.php?id='.$_GET["id"].'&wrongformat');
            exit();
            }
         } 
   
         //Check if the text inputs are empty
         if(empty($_POST["postTitle"]) && empty($_POST["postDesc"]) && empty($_POST["postCont"])) {
         header('Location: ../views/edit-post.php?id='.$_GET["id"].'&empty=form');
         exit();
         }
   
         if(empty($_POST["postTitle"])) {
            header('Location: ../views/edit-post.php?id='.$_GET["id"].'&empty=title');
            exit();
         } else if (empty($_POST["postDesc"])) {
            header('Location: ../views/edit-post.php?id='.$_GET["id"].'&empty=description');
            exit();
         } else if (empty($_POST["postCont"])) {
            header('Location: ../views/edit-post.php?id='.$_GET["id"].'&empty=content');
            exit();
         }
}