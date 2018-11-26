<?php

class Feature
{
  private $pdo;

  /* Inject the pdo connection so it is available inside of the class
   * so we can call it with '$this->pdo', always available inside of the class
   */
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function getFeaturePost(){
    $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY posts_id DESC LIMIT 1");
    $stmt->execute();
    $latest_post = $stmt->fetch();
    return $latest_post; 

  }
  
}
