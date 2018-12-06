<?php

class Category
{
 
    // database connection and table name
    private $pdo;
 
    public function __construct($pdo){
        $this->pdo = $pdo;
    }
 
    //Used to fetch all the categories in one single page
    public function getAllCategories(){
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts
            LEFT JOIN post_category ON posts.posts_id = post_category.posts_id
            LEFT JOIN categories ON categories.categories_id = post_category.category_id"
        );

        $statement->execute();
        $rows = $statement->fetchAll();

 
        return $rows;
    }


    public function getWatchesCat(){
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts
            WHERE posts.category = 'watches'"
        );

        $statement->execute();
        $rows = $statement->fetchAll();

 
        return $rows;


    } 
    
    public function getSunglassesCat(){
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts
            WHERE posts.category = 'sunglasses'"
        );

        $statement->execute();
        $rows = $statement->fetchAll();

 
        return $rows;


    } 

    public function getHomeDecoCat(){
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts
            WHERE posts.category = 'homedecor'"
        );

        $statement->execute();
        $rows = $statement->fetchAll();

 
        return $rows;


    } 
}   