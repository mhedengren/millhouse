<?php

class Comments{

    //property for pdo
    private $pdo;

    //properties for inputting data;
    public $content;
    public $created_on;
    public $created_by;
    public $posts_id;
    public $errors;
    public $comments_id;


    //Inject the pdo connection so it is available inside of the class so we can call it with '$this->pdo', always available inside of the class
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
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

    public function validation()
    {
        
        if(empty($this->content)){
            $this->errors = "Please fill in comment box before posting.";
        }
        return $this->errors;
    }


    public function readComments($posts_id)
    {
        $statement = $this->pdo->prepare("SELECT users.username, users.id, comments.comments_id, comments.content, comments.posts_id, comments.created_by, comments.created_on FROM comments
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
    public function deleteComment()
    {
        // Preperare the query
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE comments_id = :comments_id");
        $stmt->execute(
            [
        // Fetches the unique comment id and executes the query.
        ":comments_id" => $this->comments_id
            ]
        );
        
        return true;
    }
}