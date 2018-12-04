<?php
//Start session
session_start();

//Include for absolute path
require '../config.php';
require '../includes/database-connection.php';
include '../includes/functions.php';

//Page title
$page_title = 'Categories';

include '../includes/head.php'; 
include '../includes/header.php';




?>

<body>
    
    <main>

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h1>Watches</h1>
                </div>
            </div>


            <?php
            $statement = $pdo->prepare(
            //"SELECT categories_id FROM categories WHERE category = 'accessories'"
            //'SELECT * FROM categories NATURAL JOIN post_category WHERE posts_id = 1'
            'SELECT category FROM categories, post_category 
            WHERE categories.categories_id = post_category.category_id 
            AND post_category.posts_id = :posts_id'

            );

            $statement->execute(array(
                ':posts_id' => $row['post_id']
            ));
            
            $catRow = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($catRow as $category) :?>
                <div class="col-sm-12 col-md-6">
                <a href="views/single-post.php?posts_id=<?= $category["posts_id"]; ?>">
                      <div class="gallery-hero-image">
                          <img src="includes/<?= $category["image"]; ?>" alt="feature-image">
                      </div>
                      <div class="date row d-md-none justify-content-center">
                          <div class="date-circle">
                          <h6><?= $month; ?><br><?= $day; ?></h6>
                          </div>
                      </div>
                      <h2 class="gallery-post-title"><?= $category["title"]; ?></h2>
                  </a>
                  <p class="gallery-post-description">
                      <?= $post["description"]; ?>
                   </p>
                  <p class="read-more d-none d-md-block">
                      <a href="views/single-post.php?posts_id=<?= $category["posts_id"]; ?>">Read article</a>
                   </p>
              </div>
            <?php endforeach ;?>

            

         unicorns
        </div> <!-- container -->  

    </main>

</body>