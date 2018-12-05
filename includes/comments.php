<?php
session_start();

include '../includes/database-connection.php';
include '../classes/Comment.php';

$comments = new Comments($pdo);

if(isset($_POST['post-comment'])){
    $comments->prepareInfoForComments($_POST['content'], $_POST['posts_id'], $_SESSION['user_id'], date('Y-m-d'));
        if(empty($comments->validation())){
            $comments->insertComments();
            header('Location: ../views/single-post.php?posts_id='.$comments->posts_id);
        } else{
            header('Location: ../views/single-post.php?posts_id='.$comments->posts_id); 
        }
    }
//$comments->deleteComment();
$action = $_GET["action"] ?? '';

// Handles what happens if the GET action is delete.
if($action === "delete_comment")
{ 
  $comment_to_delete = $_GET["comments_id"];
  // Let the class handle what happens after this
  $comments->deleteComment($comment_to_delete);
}
