<?php

require '../classes/Posts.php';
require 'database-connection.php';

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


if($action === "create_post")
{ 
   $posts->create($_POST);
  }
  

if($action === "update_post")
{ 
   $posts->update_post($_POST);
  }

  
  
