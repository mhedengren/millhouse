<?php

class Comments{

    //property for pdo
    private $pdo;

    //properties for inputting data;
    public $content;
    public $created_by = $_SESSION['username'];
    public $posts_id;

    
}