<?php
session_start();

include '../includes/database-connection.php';
include '../classes/Comment.php';

$comments = new Comments($pdo);

$comments->prepareInfoForComments($_POST['content'], $_POST['posts_id'], $_SESSION['user_id'], date('Y-m-d'));

$comments->insertComments();

var_dump($comments->created_by);
//var_dump($_POST["content"]);
var_dump($_POST['posts_id']);
var_dump($_SESSION['user_id']);