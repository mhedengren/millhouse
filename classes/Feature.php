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
  //fetches the last post from the db.
  public function getFeaturePost(){
    $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY posts_id DESC LIMIT 1");
    $stmt->execute();
    $latestPost = $stmt->fetch();
    return $latestPost; 

  }
//fetches the 4 latests posts from the db.
  public function getLatestPosts(){
    $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY posts_id DESC LIMIT 1,4");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
      
    }
 
  }
  

