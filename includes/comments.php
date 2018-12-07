<?php
session_start();

include '../includes/database-connection.php';
include '../classes/Comment.php';

$comments = new Comments($pdo);

//if(isset($_POST['post-comment'])){
    
  /*      
    }*/
//$comments->deleteComment();
$action = $_GET["action"] ?? '';

if($action === "create_comment"){
  
    if(!empty($_POST['content'])){
    $comments->insertComment($_POST['content'], $_POST['posts_id'], $_SESSION['user_id'], date('Y-m-d H:i:s'));
    header('Location: ../views/single-post.php?posts_id='.$_GET['posts_id'].'&action=added');
      exit;
    } else {
    header('Location: ../views/single-post.php?posts_id='.$_GET['posts_id'].'&empty=content'); 
    exit;
    }
  
} 
// Handles what happens if the GET action is delete.
if($action === "delete_comment")
{  
  $comment_to_delete = $_GET["comments_id"];
  
  // Let the class handle what happens after this
  $comments->deleteComment($comment_to_delete);
//var_dump($_GET["post_id"]);
  //Redirect to single-post after deleting comment
    header('Location: ../views/single-post.php?posts_id='.$_GET["post_id"]);
    exit; 
}
