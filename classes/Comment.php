<?php

class Comments{

    //property for pdo
    private $pdo;

    //properties for inputting data;
    public $content;
    public $date;  // = date(Y-m-d);

    //Attempting to bring a session username as property but getting "invalid operations" error
    public $created_by; //= $_SESSION['username'];
    //public $posts_id;

    //Inject the pdo connection so it is available inside of the class so we can call it with '$this->pdo', always available inside of the class
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    //Attempting to get posts.posts_id available to insert into comments table
    public function getPosts_id()
    {
        $statement = $this->pdo->prepare("SELECT posts.id FROM posts 
        INNER JOIN comments
        ON posts.posts_id = comments.posts_id
        WHERE posts_id = :posts_id");
        $statement->execute(
            [
            ":posts_id" => $_GET['posts_id']
            ]
        );
        $posts_id = $statement->fetch();
        return $posts_id;
    }

    //Attempting to insert into comments table
    public function addComments()
    {
        $statement = $this->pdo->prepare("INSERT INTO comments (content, 
        posts_id, created_by, created_on) VALUES (:content, :posts_id, :created_by, :created_on)");
        $statement->execute(
            [
            ":content" => $this->content,
            ":posts_id" => $this->posts_id,
            ":created_by" => $_SESSION['username'],
            ":created_on" => $this->date
            ]
        );
    }
}