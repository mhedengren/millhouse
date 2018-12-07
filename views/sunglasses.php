<?php
session_start();

//Include for absolute path
require '../config.php';
require '../includes/database-connection.php';
include '../includes/functions.php';
include '../includes/date.php';


//Page title
$page_title = 'Categories'; 
include '../includes/head.php';
include '../includes/header.php';

include '../classes/category.php';
$object3 = new Category($pdo);
$object3->getSunglassesCat();
$sunglasses = $object3->getSunglassesCat();


?>

<main id="categories">  

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Category: Sunglasses</h1>
            </div>
        </div> 

        <div class="row category-list">
        <?php foreach($sunglasses as $single_category) : ?>
        
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="category-card">
                        <a href="single-post.php?posts_id=<?= $single_category["posts_id"]; ?>">
                        <div class="gallery-hero-image">
                            <img src="../includes/<?= $single_category["image"]; ?>" alt="feature-image">
                        </div>
                        <div class="date row d-md-none justify-content-center">
                            <div class="date-circle">
                            <h6><?= $month; ?><br><?= $day; ?></h6>
                            </div>
                        </div>
                        <h2 class="gallery-post-title"><?= $single_category["title"]; ?></h2>
                        </a>
                        <p class="gallery-post-description">
                        <?= $single_category["description"]; ?>
                    </p>
                    <p class="read-more d-none d-md-block">
                        <a href="single-post.php?posts_id=<?= $single_category["posts_id"]; ?>">Read/comment article</a>
                    </p>
                </div><!-- category-card -->
            </div><!-- col -->    
            
        <?php endforeach ;?>
        </div><!--- category-list -->
    </div>

</main>


