<?php
session_start();
require 'database-connection.php';
require '../classes/Posts.php';

$posts = new Posts($pdo);
$postId = $_POST['postId'];
$image = $_FILES['image'];
//Moves image from temporary location to set location.
$temporary_location = $image["tmp_name"];
$new_location = "uploads/" . $image["name"];
$upload_ok = move_uploaded_file($temporary_location, $new_location);

//Define action variable.
$action = $_GET["action"] ?? '';

// Handles what happens if the GET action is create_post.
if($action === "create_post")
{ 
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

   //Call to create method.
   $posts->create($_POST["postTitle"], $_POST["postDesc"], $_POST["postCont"], $_SESSION["user_id"], date('Y-m-d H:i:s'), $new_location, $_POST['categories'] );
}

// Handles what happens if the GET action is read_post.
if($action === "read_post")
{ 
   $id_to_read = $_GET["id"];
   //Pass ID along header location for it to be available on the next page.
   header('Location: ../views/edit-post.php?id='.$id_to_read);
}

// Handles what happens if the GET action is update_post.
if($action === "update_post")
{ 
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
      
   //Call to update method
   $posts->update($_POST["postTitle"], $_POST["postDesc"], $_POST["postCont"], $new_location, $_POST['categories'], $postId );
}

// Handles what happens if the GET action is delete_post.
if($action === "delete_post")
{ 
  $id_to_delete = $_GET["id"];
  $posts->delete($id_to_delete);
}

  
