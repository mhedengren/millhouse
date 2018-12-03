<?php
session_start();

include '../includes/database-connection.php';
include '../classes/Comment.php';

$comments = new Comments($pdo);

$comments->prepareInfoForComments($_POST['content'], $_POST['posts_id'], $_SESSION['user_id'], date('Y-m-d'));

$comments->insertComments();
//var_dump($comments->posts_id);

header('Location: ../views/single-post.php?posts_id='.$comments->posts_id);
