<?php
session_start();

include '../includes/database-connection.php';
include '../classes/Comment.php';

$object = new Comments($pdo);

var_dump($_POST["content"]);
var_dump($_POST['posts_id']);
var_dump($_SESSION['username']);