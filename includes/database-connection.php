<?php

$database_host = 'mysql:host=localhost:8889;dbname=example;charset=utf8';
$database_username = 'root';
$database_password = 'root';

$pdo = new PDO($database_host, $database_username, $database_password);
// Display all query errors that occur, otherwise these are muted
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
