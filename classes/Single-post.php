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

  public function getSinglePost(){
    //$posts_id = isset($_GET['posts_id']) ? $_GET['posts_id'] : 0;

    $stmt = $this->pdo->prepare("SELECT posts_id, posts.title, posts.description, posts.created_by, posts.created_on, posts.image, posts.content, 
    users.username FROM posts
    INNER JOIN users
    ON posts.created_by = users.admin
    where posts_id = :posts_id");
    
    $stmt->execute([
      ":posts_id" => $_GET["posts_id"],
    ]);

    $singlePost = $stmt->fetch();
    return $singlePost; 
    //$scid = isset($_GET['scid']) ? $_GET['scid'] : 0;
  }
}
