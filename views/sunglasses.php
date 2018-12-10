<?php
//Page title
$page_title = 'Categories'; 

//Includes session, database, config, classes
include '../includes/initialize.php';

//Redirect to login.php if user is not logged in
is_login('login-form.php');


//session_start();

//Include for absolute path
//require '../config.php';
//require '../includes/database-connection.php';
//include '../includes/functions.php';

//include '../includes/head.php';
include '../includes/header.php';

$object3 = new Posts($pdo);
$object3->getSunglassesCat();
$sunglasses = $object3->getSunglassesCat();


?>

<main id="categories">  

    <div class="container-fluid"> 
        <div class="row"> 
            <div class="hero-image">
                <img src="../images/shades3.jpg" alt="Watch">
                <h1>Sunglasses</h1>  
            </div>
        </div>

        <section class="category-gallery">
            <div class="container">
        
            <?php foreach($sunglasses as $single_category) : ?>
            <div class="container">
                <div class="row content">

                    <div class="col-sm-12 col-md-6 post-details">
                            <div class="date row d-md-none justify-content-center">
                                <div class="date-circle">
                                    <h6 class="date"><?= $single_category["created_on"]; ?></h6>
                                </div>
                            </div>
                            <a href="single-post.php?posts_id=<?= $single_category["posts_id"]; ?>">
                                <h2 class="post-title"><?= $single_category["title"]; ?></h2>
                            </a>
                            <p class="post-description"><?= $single_category["description"]; ?></p>
                            <p class="read-more d-none d-md-block">
                                <a href="single-post.php?posts_id=<?= $single_category["posts_id"]; ?>">Read/comment article</a>
                            </p>  
                        </div>
                     
                    <div class="col-sm-12 col-md-6">
                        <div class="post-img">
                            <a href="single-post.php?posts_id=<?= $single_category["posts_id"]; ?>">
                                <div class="gallery-hero-image">
                                    <img src="../includes/<?= $single_category["image"]; ?>" alt="feature-image">
                                </div>  
                            </a>  
                        </div>
                    </div> 

                </div><!-- row .content -->
            </div><!-- container --> 
            
        <?php endforeach ;?>
        </div><!--- category-list -->
    </div>

</main>


