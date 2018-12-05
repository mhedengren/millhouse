<?php

class Posts
{

  //property for pdo
  private $pdo;

   //properties for inputting data; 
   public $title;
   public $description;
   public $content;
   public $created_on;
   public $created_by;
   public $posts_id;
   public $errors;
  
  /* Inject the pdo connection so it is available inside of the class
   * so we can call it with '$this->pdo', always available inside of the class */
  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  // Method for deleting a post
  public function delete()
  {
      // Preperare the query
      $stmt = $this->pdo->prepare("DELETE FROM posts WHERE posts_id = :posts_id");
      $stmt->execute(
          [
      // Fetches the unique post id and executes the query.
      ":posts_id" => $_GET["id"],
          ]
      );
      // Return to index
      header('Location: ../index.php');
      return true;
  }

  public function create($title, $description, $content, $created_by, $created_on, $image){
    
    $statement = $this->pdo->prepare("INSERT INTO posts (title, description, content, created_by, created_on, image) 
    VALUES (:postTitle, :postDesc, :postCont, :created_by, :postDate, :image)");
    $statement->execute(

        [
        ":postTitle" => $title,
        ":postDesc" => $description,  
        ":postCont" => $content,
        ":created_by" => $created_by,
        ":postDate" => $created_on,
        ":image" => "hej"
        ]
    );

    return true;
    
  }

  

  public function update(){
    
  }
  
  

}

  
    
