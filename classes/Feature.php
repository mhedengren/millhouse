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
  //fetches the last post from the db
  public function getFeaturePost(){
    $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY posts_id DESC LIMIT 1");
    $stmt->execute();
    $latestPost = $stmt->fetch();
    return $latestPost; 

  }

  public function getLatestPosts(){
    $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY posts_id DESC LIMIT 4");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
      
    }
 
  }
  

