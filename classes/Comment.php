<?php

class Comments{

    //property for pdo
    private $pdo;

    //properties for inputting data;
    public $content;
    public $created_on;
    public $created_by;
    public $posts_id;

    //Inject the pdo connection so it is available inside of the class so we can call it with '$this->pdo', always available inside of the class
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    //Attempting to get posts.posts_id available to insert into comments table
    /*public function getPosts_id()
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
    }*/
    //This sets properties for comments 
    public function prepareInfoForComments($content, $posts_id, $created_by, $created_on)
    {
        $this->content = $content;
        $this->posts_id = $posts_id;
        $this->created_by = $created_by;
        $this->created_on = $created_on;
    }

    public function insertComments()
    {
        $statement = $this->pdo->prepare("INSERT INTO comments (content, 
        posts_id, created_by, created_on) VALUES (:content, :posts_id, :created_by, :created_on)");
        $statement->execute(

            [
            ":content" => $this->content,
            ":posts_id" => $this->posts_id,
            ":created_by" => $this->created_by,
            ":created_on" => $this->created_on
            ]
        );
    }

    public function readComments($posts_id)
    {
        $statement = $this->pdo->prepare("SELECT users.username, users.id, comments.content, comments.posts_id, comments.created_by, comments.created_on FROM comments
        INNER JOIN users
        ON users.id = comments.created_by
        WHERE posts_id = :posts_id");
        $statement->execute(
            [
            ":posts_id" => $posts_id
            ]
        );
        $comments = $statement->fetchAll();
        return $comments;
    }
}