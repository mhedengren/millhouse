<?php

class Aside
{
    private $pdo;

    /* Inject the pdo connection so it is available inside of the class
   * so we can call it with '$this->pdo', always available inside of the class
   */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    //fetches the post from the db.
        public function getPostAside(){
            $aside_stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY title ASC LIMIT 4");
            $aside_stmt->execute();
            $asidePosts = $aside_stmt->fetchAll();
            return $asidePosts; 
        }
}