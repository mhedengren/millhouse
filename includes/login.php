<?php

session_start();

include "database-connection.php";

// Easier way to handle postform

$username = $_POST["login_username"];
$password = $_POST["login_password"];

//No whitespace betweem $pdo and prepare

$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");

// Execute populates the statement and runs it

$statement->execute(
[
    ":username" => $username
]
);

//When select is used, fetch must happen

$fetched_user = $statement->fetch();



// 4. Compare

$is_password_correct = password_verify($password, $fetched_user["password"]);

if ($is_password_correct) {

    //Save user globally to session
    $_SESSION["username"] = $fetched_user["username"];
    header("Location: ../views/index.php");

} else {

    //Handle errors, go back to frontpage and populate $_GET
    header("Location: ../views/login_form.php?login_failed=true");
}