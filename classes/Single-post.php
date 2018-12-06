<?php

class SinglePost
{
  private $pdo;

  /* Inject the pdo connection so it is available inside of the class
   * so we can call it with '$this->pdo', always available inside of the class
   */
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  //Select statment to prepare and fetch single post
  public function getSinglePost(){

    $stmt = $this->pdo->prepare("SELECT posts_id, posts.title, posts.description, posts.created_by, posts.created_on, posts.image, posts.content, 
    users.username FROM posts
    INNER JOIN users
    ON posts.created_by = users.id
    where posts_id = :posts_id");
    
    $stmt->execute([
      ":posts_id" => $_GET["posts_id"],
    ]);

    $singlePost = $stmt->fetch();
    return $singlePost; 
   
  }
}
