<?php
require '../includes/database-connection.php';

//var_dump($_POST["postTitle"]);
//var_dump($_POST["postDesc"]);
//var_dump($_FILES["image"]);

if(isset($_POST['submit'])){

  //Retrieve the inputs values from the form
  $postTitle = $_POST['postTitle'];
  $postDesc = $_POST['postDesc'];
  $created_by = $_SESSION['admin'];
  $created_on = date('Y-m-d');
  $image = $_FILES["image"];


  $temporary_location = $image["tmp_name"];
  $new_location = "uploads/" . $image["name"];
  $upload_ok = move_uploaded_file($temporary_location, $new_location);

  //Check if the inputs are empty
  if(empty($_POST["postTitle"]) || empty($_POST["postDesc"])) {
        header('Location: ../views/admin-page.php?action=empty');
        exit();
    }

  //if no error has been set then insert the data into the database
  if($upload_ok){
    try {
        $statement = $pdo->prepare(
          'INSERT INTO posts (title, description, created_by, created_on, image) 
          VALUES (:postTitle, :postDesc, :created_by, :postDate, :image)'
          );

        $statement->execute(array(
            ':postTitle' => $postTitle,
            ':postDesc' => $postDesc,
            ':created_by' => $created_by,
            ':postDate' => $created_on,
            ":image" => $new_location
        ));

        //redirect to admin page
        header('Location: ../views/admin-page.php?action=added');
        exit;

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }
}
