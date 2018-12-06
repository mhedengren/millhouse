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

/* Following the MVC-model. This is the controller. 
   Index is the view. And Class is the model. */

$action = $_GET["action"] ?? '';

// Handles what happens if the GET action is create_post.
if($action === "create_post")
{ 
   $posts->create($_POST["postTitle"], $_POST["postDesc"], $_POST["postCont"], $_SESSION["user_id"], date('Y-m-d'), $new_location, $_POST['categories'] );
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
   $posts->update($_POST["postTitle"], $_POST["postDesc"], $_POST["postCont"], $new_location, $_POST['categories'], $postId );
}

// Handles what happens if the GET action is delete_post.
if($action === "delete_post")
{ 
  $id_to_delete = $_GET["id"];
  $posts->delete($id_to_delete);
}

  
