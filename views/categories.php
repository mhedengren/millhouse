<?php
session_start();

//Include for absolute path
require '../config.php';
require '../includes/database-connection.php';
include '../includes/functions.php';

//Page title
$page_title = 'Categories'; 
include '../includes/head.php';
include '../includes/header.php';

include '../classes/category.php';
$object = new Category($pdo);
$object->getAllCategories();
$categories = $object->getAllCategories();


//var_dump($categories);

?>

<main id="categories">  

    <div class="container"> 
        <div class="row">
            <div class="col-sm-12">
                <h1>All categories</h1>
            </div>
        </div>

        <div class="row category-list">
            <?php foreach($categories as $category) : ?>
       
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="category-card">
                        <a href="single-post.php?posts_id=<?= $category["posts_id"]; ?>">
                        <div class="gallery-hero-image">
                            <img src="../includes/<?= $category["image"]; ?>" alt="feature-image">
                        </div>
                        <div class="date row d-md-none justify-content-center">
                            <div class="date-circle">
                            <h6><?= $month; ?><br><?= $day; ?></h6>
                            </div>
                        </div>
                        <h2 class="gallery-post-title"><?= $category["title"]; ?></h2>
                        </a>
                        <p class="gallery-post-description">
                        <?= $category["description"]; ?>
                    </p>
                    <p class="read-more d-none d-md-block">
                        <a href="single-post.php?posts_id=<?= $category["posts_id"]; ?>">Read/comment article</a>
                    </p>
                    </div><!-- category-card -->
                </div><!-- col -->    
            
            <?php endforeach ;?>
        </div><!--- category-list -->

    </div>
     
</main>
<?php include '../includes/footer.php'; ?>


