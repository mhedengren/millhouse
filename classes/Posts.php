<?php

class Posts
{
  private $pdo;
  
  

  /* Inject the pdo connection so it is available inside of the class
   * so we can call it with '$this->pdo', always available inside of the class
   */

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  // Method for deleting a post
  public function delete()
  {
      // Preperare the query
      $stmt = $this->pdo->prepare("DELETE FROM posts WHERE posts_id = :posts_id");
      $stmt->execute(
          [
      // Fetches the unique post id and executes the query.
      ":posts_id" => $_GET["id"],
          ]
      );
      // Return to index
      header('Location: ../index.php');
      return true;
  }

  public function create(){
    
  }

  public function update(){
    
  }
  
  

}

  
    
