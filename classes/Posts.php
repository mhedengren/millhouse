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

  public function delete()
  {
      $stmt = $this->pdo->prepare("DELETE FROM posts WHERE posts_id = :posts_id");
      $stmt->execute(
          [
      ":posts_id" => $_GET["id"],
          ]
      );
      header('Location: ../index.php');
      return true;
  }

  public function create($newPost)
  {
    return true;
  }
}