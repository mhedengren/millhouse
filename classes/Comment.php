<?php

class Comments{

    //property for pdo
    private $pdo;

    //properties for inputting data;
    public $content;
    public $created_on;
    public $created_by;
    public $posts_id;
    public $comments_id;

    //Inject the pdo connection so it is available inside of the class so we can call it with '$this->pdo', always available inside of the class
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Insert new comments into database
    public function insertComment($content, $posts_id, $created_by, $created_on)
    {
        $statement = $this->pdo->prepare("INSERT INTO comments (content, 
        posts_id, created_by, created_on) VALUES (:content, :posts_id, :created_by, :created_on)");
        $statement->execute(

            [
                ":content" => $content,
                ":posts_id" => $posts_id,
                ":created_by" => $created_by,
                ":created_on" => $created_on
            ]
        );
    }

    //Select and fetch comments to be displayed on single-post page by post_id
    public function readComments($posts_id)
    {
        $statement = $this->pdo->prepare("SELECT users.username, users.id, comments.comments_id, comments.content, comments.posts_id, comments.created_by, comments.created_on FROM comments
        INNER JOIN users
        ON users.id = comments.created_by
        WHERE posts_id = :posts_id
        ORDER BY comments.created_on DESC");
        $statement->execute(
            [
                ":posts_id" => $posts_id
            ]
        );
        $comments = $statement->fetchAll();
        return $comments;
    }

    //Delete one comment when select on single-post page
    public function deleteComment()
    {
        // Preperare the query
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE comments_id = :comments_id");
        $stmt->execute(
            [
                // Fetches the unique comment id and executes the query.
                ":comments_id" => $_GET["comments_id"]
            ]
        );

        return true;

    }   
}