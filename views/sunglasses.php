<?php
//Page title
$page_title = 'Categories'; 

//Includes session, database, config, classes
include '../includes/initialize.php';

//Redirect to login.php if user is not logged in
is_login('login-form.php');

include '../includes/header.php';

$object3 = new Posts($pdo);
$object3->getSunglassesCat();
$sunglasses = $object3->getSunglassesCat();
?>

<main id="categories">  
    
    <div class="container-fluid"> 
        <div class="row"> 
            <div class="hero-image">
                <img src="../images/sunglasses_lightest.jpg" alt="Watch">
                <h1>Sunglasses</h1>  
            </div>
        </div>

        <section class="category-gallery d-none d-md-block">
            <div class="container">
        
            <?php foreach($sunglasses as $post) : ?>
            <div class="container">
            <?php include '../includes/edit-remove-category.php'; ?>
            <?php include '../includes/date.php'; ?>
                <div class="row content">
                    <div class="col-sm-12 col-md-6 post-details">
                            <h6><?= $longmonth.' '. $day; ?></h6>
                            <a href="single-post.php?posts_id=<?= $post["posts_id"]; ?>">
                                <h2 class="post-title"><?= $post["title"]; ?></h2>
                            </a>
                            <p class="post-description"><?= $post["description"]; ?></p>
                        </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="post-img">
                            <a href="single-post.php?posts_id=<?= $post["posts_id"]; ?>">
                                <div class="gallery-hero-image">
                                    <img src="../includes/<?= $post["image"]; ?>" alt="feature-image">
                                </div>  
                            </a>  
                        </div>
                    </div> 

                <!-- row .content -->
            </div><!-- container --> 
            </div>
        <?php endforeach ;?>
        </div><!--- category-list -->
    </div>

    <!--- Mobile gallery --->
<div class="container d-md-none"> 
        <div class="row category-list">
            <?php foreach($sunglasses as $post) : ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
            <?php include '../includes/date.php'; ?>
            <?php include '../includes/edit-remove-category.php'; ?>
                <div class="category-card">
                        <a class="no-hover" href="single-post.php?posts_id=<?= $post["posts_id"]; ?>">
                        <div class="gallery-hero-image">
                            <img src="../includes/<?= $post["image"]; ?>" alt="feature-image">
                        </div>
                        <div class="date row d-md-none justify-content-center">
                            <div class="date-circle">
                            <h6><?= $month; ?><br><?= $day; ?></h6>
                            </div>
                        </div>
                        <h2 class="gallery-post-title"><?= $post["title"]; ?></h2>
                        </a>
                        <p class="gallery-post-description">
                        <?= $post["description"]; ?>
                    </p>
                    <p class="read-more d-none d-md-block">
                        <a href="single-post.php?posts_id=<?= $post["posts_id"]; ?>">Read/comment article</a>
                    </p>
                    </div><!-- category-card -->
                </div><!-- col -->    
            
            <?php endforeach ;?>
        </div><!--- category-list -->

    </div>

</main>


 <?php include '../includes/footer.php'; ?>