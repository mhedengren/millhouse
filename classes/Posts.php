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
    public function create($title, $description, $content, $created_by, $created_on, $image, $alt, $category){

        $statement = $this->pdo->prepare("INSERT INTO posts (title, description, content, created_by, created_on, image, alt, category) 
        VALUES (:postTitle, :postDesc, :postCont, :created_by, :postDate, :image, :alt, :categories)");
        $statement->execute(
            [
                ":postTitle" => $title,
                ":postDesc" => $description,  
                ":postCont" => $content,
                ":created_by" => $created_by,
                ":postDate" => $created_on,
                ":image" => $image,
                ":alt" => $alt,
                ":categories" => $category
            ]
        );

        //Redirect to admin page.
        header('Location: ../views/admin-page.php?action=added');
        return true;
        exit;
    }

    //Method for reading the post that is going to be updated.
    public function readPost()
    {
    $stmt = $this->pdo->prepare("SELECT posts_id, posts.title, posts.description, posts.created_by, posts.created_on, posts.image, posts.alt, posts.content
    FROM posts
    where posts_id = :posts_id");

        $stmt->execute([
            ":posts_id" => $_GET["id"],
        ]);
        $singlePost = $stmt->fetch();
        return $singlePost; 
    }

    //Method for updating a post.
    public function update($title, $description, $content, $image, $alt, $category, $postId){

        $statement = $this->pdo->prepare(
        'UPDATE posts SET title = :postTitle, description = :postDesc, content = :postCont, image = :image, alt = :alt, category = :categories
         WHERE posts_id = :posts_id'
        );

        $statement->execute(array(
            ':postTitle' => $title,
            ':postDesc' => $description,
            ':postCont' => $content,
            ':image' => $image,
            ':alt' => $alt,
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

        //fetches the last post from the db.
    public function getFeaturePost()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY posts_id DESC LIMIT 1");
        $stmt->execute();
        $latestPost = $stmt->fetch();
        return $latestPost; 
    }
    //fetches the 4 latests posts from the db.
    public function getLatestPosts()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM posts ORDER BY posts_id DESC LIMIT 1,4");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    //fetches a single post based on post id 
    public function getSinglePost()
    {
        $stmt = $this->pdo->prepare("SELECT posts_id, posts.title, posts.description, posts.created_by, posts.created_on, posts.image, posts.alt, posts.content, 
        users.username FROM posts
        INNER JOIN users
        ON posts.created_by = users.id
        where posts_id = :posts_id");
        
        $stmt->execute([
          ":posts_id" => $_GET["posts_id"],
        ]);
    
        $singlePost = $stmt->fetch();
        return $singlePost;  
      }

      //Used to fetch all the categories in one single page
    public function getAllCategories()
    {
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts order by created_on DESC"
        );

        $statement->execute();

        $rows = $statement->fetchAll();
        return $rows;
    }


    public function getWatchesCat()
    {
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts
            WHERE posts.category = 'watches' 
            order by created_on DESC"
        );

        $statement->execute();
        $rows = $statement->fetchAll();

        return $rows;
    } 
    
    public function getSunglassesCat()
    {
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts
            WHERE posts.category = 'sunglasses'
            order by created_on DESC"
        );

        $statement->execute();
        $rows = $statement->fetchAll();

        return $rows;
    } 

    public function getHomeDecoCat()
    {
        //select all data
        $statement = $this->pdo->prepare(
            "SELECT * FROM posts
            WHERE posts.category = 'homedecor'
            order by created_on DESC"
        );
        $statement->execute();

        $rows = $statement->fetchAll();
        
        return $rows;
    } 
}