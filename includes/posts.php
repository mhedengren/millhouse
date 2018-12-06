<?php
session_start();
require 'database-connection.php';
require '../classes/Posts.php';

/* Pass along the $pdo variable when you create a new instance
 * of the class, $pdo becomes $this->pdo. $posts is used
 * to call the specific methods inside of the Posts class
 * */
$posts = new Posts($pdo);

/**
 * This is how we would call this file in a HTML-form if we want to
 * utilize both the GET variable and the POST variable as we do below
 * 
 * ---> TO create new post with form
 * <form action="includes/posts.php?action=create_post" method="POST">
 *  <input type="text" name="title">
 *  <input type="text" name="description">
 * </form>
 * 
 * ---> To delete a post with link or form
 * <a href="includes/posts.php?action=delete&id=3" > Delete Post </a>
 */

/* Following the MVC-model, this would be the controller. 
   Index is the view. And Class is model. */

$action = $_GET["action"] ?? '';

// Handles what happens if the GET action is delete.
if($action === "delete_post")
{ 
  $id_to_delete = $_GET["id"];
  // Let the class handle what happens after this
  $posts->delete($id_to_delete);
}

$image = $_FILES['image'];
//Moves image from temporary location to set location.
$temporary_location = $image["tmp_name"];
$new_location = "uploads/" . $image["name"];
$upload_ok = move_uploaded_file($temporary_location, $new_location);

if($action === "create_post"){ 
   $posts->create($_POST["postTitle"], $_POST["postDesc"], $_POST["postCont"], $_SESSION["user_id"], date('Y-m-d'), $new_location, $_POST['categories'] );
   
}

if($action === "read_post")
{ 

   $id_to_read = $_GET["id"];
   header('Location: ../views/edit-post.php?id='.$id_to_read);
}


if($action === "update_post")
{ 
   $posts->update($_POST["postTitle"], $_POST["postDesc"], $_POST["postCont"], $_SESSION["user_id"], $new_location, $_POST['categories'] );
}


  
  
