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
   public $category;
  
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

      $stmt = $this->pdo->prepare("DELETE FROM comments WHERE posts_id = :posts_id");
      $stmt->execute(
          [
              ":posts_id" => $_GET["id"]
          ]
        );
      // Return to index
      header('Location: ../index.php');
      return true;
  }
 //Method for creating a new post
  public function create($title, $description, $content, $created_by, $created_on, $image, $category){
    
    $statement = $this->pdo->prepare("INSERT INTO posts (title, description, content, created_by, created_on, image, category) 
    VALUES (:postTitle, :postDesc, :postCont, :created_by, :postDate, :image, :categories)");
    $statement->execute(
        [
        ":postTitle" => $title,
        ":postDesc" => $description,  
        ":postCont" => $content,
        ":created_by" => $created_by,
        ":postDate" => $created_on,
        ":image" => $image,
        ":categories" => $category
        
        ]
    );

    
     //redirect to admin page
     header('Location: ../views/admin-page.php?action=added');
     return true;
     exit;
  }
 //Method for readig the post that is going to be updated
  public function readPost(){
    $stmt = $this->pdo->prepare("SELECT posts_id, posts.title, posts.description, posts.created_by, posts.created_on, posts.image, posts.content
    FROM posts
    where posts_id = :posts_id");
    
    $stmt->execute([
      ":posts_id" => $_GET["id"],
    ]);
    $singlePost = $stmt->fetch();
    return $singlePost; 
  }

  public function update($title, $description, $content, $image, $category){
      
    $postId = $_POST['postId'];
    $image = $_FILES['image'];
    //Moves image from temporary location to set location.
    $temporary_location = $image["tmp_name"];
    $new_location = "uploads/" . $image["name"];
    $upload_ok = move_uploaded_file($temporary_location, $new_location);

    $statement = $this->pdo->prepare(
        'UPDATE posts SET title = :postTitle, description = :postDesc, content = :postCont, image = :image
         WHERE posts_id = :posts_id'
        );

      $statement->execute(array(
          ':postTitle' => $title,
          ':postDesc' => $description,
          ':postCont' => $content,
          ':posts_id' => $postId,
          ':image' => $new_location
      ));
         // Return to index
         header('Location: ../index.php');
         exit;
  }

}

  
    
