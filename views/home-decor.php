<?php
//Page title
$page_title = 'Home Decor'; 

//Includes session, database, config, classes
include '../includes/initialize.php';

//Redirect to login.php if user is not logged in
is_login('login-form.php');

include '../includes/header.php';

$object4 = new Posts($pdo);
$object4->getHomeDecoCat();
$homeDecor = $object4->getHomeDecoCat();

?>

<main id="categories">  

    <div class="container-fluid"> 
        <div class="row"> 
            <div class="hero-image">
                <img src="../images/homedecor_light.jpg" alt="Watch">
                <h1>Home Decor</h1>  
            </div>
        </div>
        <!--- Tablet and desktop category --->
        <section class="category-gallery d-none d-md-block">
            <div class="container">
        
            <?php foreach($homeDecor as $single_category) : ?>
            <div class="container">
                <?php include '../includes/edit-remove-category.php'; ?>
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
        
<!--- Mobile gallery --->
<div class="container d-md-none"> 
        <div class="row category-list">
            <?php foreach($homeDecor as $single_category) : ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?php include '../includes/edit-remove-category.php'; ?>
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


 <?php include '../includes/footer.php'; ?>