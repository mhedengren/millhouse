<?php
session_start();

include '../includes/database-connection.php';
include '../classes/Comment.php';

$comments = new Comments($pdo);

//calls action
$action = $_GET["action"] ?? '';

//states if action is called as create_comment
if($action === "create_comment"){

    //and if the content of comments box is NOT empty  
    if(!empty($_POST['content'])){

        //redirect to same post after adding comment to database and page
        $comments->insertComment($_POST['content'], $_POST['posts_id'], $_SESSION['user_id'], date('Y-m-d H:i:s'));
        header('Location: ../views/single-post.php?posts_id='.$_GET['posts_id'].'&action=added');
        exit;

        //if box is empty redirect to same post with error msg  
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

    //Redirect to single-post after deleting comment
    header('Location: ../views/single-post.php?posts_id='.$_GET["post_id"]);
    exit; 
}
