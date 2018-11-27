<?php

class FeatureSingle
{
    private $pdo;

        /* Inject the pdo connection so it is available inside of the class
   * so we can call it with '$this->pdo', always available inside of the class
   */
        public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getFeaturePostSingle(){
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE posts_id = :posts_id");
        $stmt->execute([
            ":posts_id" => $_GET["id"]
        ]);
        $latestPost = $stmt->fetch();
        return $latestPost; 

    }
    /*
  public function getLatestPosts(){
    $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY posts_id DESC LIMIT 4");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    foreach ($rows as $row);{
      echo $row['title'];

    }

  }
  */
}
