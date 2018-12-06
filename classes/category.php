<?php

class Category
{
 
    // database connection and table name
    private $pdo;
 
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
 
    // used by select drop-down list
    public function getCategory(){
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts
            LEFT JOIN post_category ON posts.posts_id = post_category.posts_id
            LEFT JOIN categories ON categories.categories_id = post_category.category_id
            ORDER BY posts.created_on DESC"
        );

        $statement->execute();
        $rows = $statement->fetchAll();

 
        return $rows;
    }

}   