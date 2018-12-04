<?php
session_start();
require '../includes/database-connection.php';

//var_dump($_POST["postTitle"]);
//var_dump($_POST["postDesc"]);
//var_dump($_FILES["image"]);

if(isset($_POST['submit'])){

  //Retrieve the inputs values from the form
  $postTitle = $_POST['postTitle'];
  $postDesc = $_POST['postDesc'];
  $postCont = $_POST['postCont'];
  //$created_by = $_SESSION['user'];
  $created_on = date('Y-m-d');
  $image = $_FILES['image'];
  $category = $_POST['categories'];

  //Post ID fetched from a hidden input-field in edit-post.php
  $postId = $_POST['postId'];


  $temporary_location = $image["tmp_name"];
  $new_location = "uploads/" . $image["name"];
  $upload_ok = move_uploaded_file($temporary_location, $new_location);


  //Check if the user has uploaded an image
  if (!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
      header('Location: ../views/edit-post.php?upload=empty');
      exit(); 
  } else if(isset($_FILES['image'])){
      $errors= array();
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $formats = array("jpeg","jpg","png");
      
      //Checking the file format of the uploaded file
      if(in_array($file_ext,$formats) === false) {
        header('Location: ../views/edit-post.php?upload=wrongformat');
        exit();
      }
    } 


  //Check if the text inputs are empty
  if(empty($_POST["postTitle"]) && empty($_POST["postDesc"]) && empty($_POST["postCont"])) {
    header('Location: ../views/admin-page.php?empty=form');
    exit();
  }

  if(empty($_POST["postTitle"])) {
        header('Location: ../views/admin-page.php?empty=title');
        exit();
  } else if (empty($_POST["postDesc"])) {
        header('Location: ../views/admin-page.php?empty=description');
        exit();
  } else if (empty($_POST["postCont"])) {
        header('Location: ../views/admin-page.php?empty=content');
        exit();
  }
    


  //if all the inputs have been filled in then update the data in the database
  if($upload_ok){
    try {
        $statement = $pdo->prepare(
          'UPDATE posts SET title = :postTitle, description = :postDesc, content = :postCont, image = :image
           WHERE posts_id = :posts_id'
          );

        $statement->execute(array(
            ':postTitle' => $postTitle,
            ':postDesc' => $postDesc,
            ':postCont' => $postCont,
            ':posts_id' => $postId,
            ':image' => $new_location
        ));
/*
        $statement = $pdo->prepare(
          'INSERT INTO categories (category) VALUES (:categories)'
        );

        $statement->execute(array(
          ':categories' => $category
        ));
*/
        

        //redirect to admin page
        header('Location: ../index.php');
        exit;

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
  }
}
