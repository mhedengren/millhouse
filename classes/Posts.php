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

  // Method for deleting a post and coorelating comments
  public function delete()
  {
      // Preperare the query to delete post
      $stmt = $this->pdo->prepare("DELETE FROM posts WHERE posts_id = :posts_id");
      $stmt->execute(
          [
      // Fetches the unique post id and executes the query.
      ":posts_id" => $_GET["id"],
          ]
      );

      // Preperare the query to delete all comments on this post
      $stmt = $this->pdo->prepare("DELETE FROM comments WHERE posts_id = :posts_id");
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

        //Redirect to admin page.
        header('Location: ../views/admin-page.php?action=added');
        return true;
        exit;
    }

    //Method for reading the post that is going to be updated.
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

    //Method for updating a post.
    public function update($title, $description, $content, $image, $category, $postId){

        $statement = $this->pdo->prepare(
            'UPDATE posts SET title = :postTitle, description = :postDesc, content = :postCont, image = :image, category = :categories
         WHERE posts_id = :posts_id'
        );

        $statement->execute(array(
            ':postTitle' => $title,
            ':postDesc' => $description,
            ':postCont' => $content,
            ':image' => $image,
            ':categories' => $category,
            ':posts_id' => $postId

        ));
        // Return to index
        header('Location: ../index.php');
        exit;
    }

    //Method for reading the post for the aside section.
    public function getPostAside()
    {
        $aside_stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY title ASC LIMIT 4");
        $aside_stmt->execute();
        $asidePosts = $aside_stmt->fetchAll();
        return $asidePosts; 
    }

}