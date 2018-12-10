<?php
//Page title
$page_title = 'Categories'; 

//Includes session, database, config, classes
include '../includes/initialize.php';

//Redirect to login.php if user is not logged in
is_login('login-form.php');

include '../includes/header.php';
include '../includes/date.php';

$object2 = new Posts($pdo);
$object2->getWatchesCat();
$watches = $object2->getWatchesCat();
?>

<main id="categories">  

    <div class="container-fluid"> 
        <div class="row"> 
            <div class="hero-image">
                <img src="../images/watch.jpg" alt="Watch">
                <h1>Watches</h1>  
            </div>
        </div>

        <section class="category-gallery">
            <div class="container">
        
            <?php foreach($watches as $single_category) : ?>
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
                
                </div><!--- row -->
            </div><!-- container -->
        </section>
    

           

    </div><!-- container-fluid --> 
     
</main>


