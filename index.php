<?php
session_start();

//Define the siteroot for includes/requires'
include 'config.php';

//Page title
$page_title = 'Index';

include 'includes/head.php'; 
include 'includes/header.php';
include 'includes/database-connection.php';
include 'classes/Feature.php';
$object = new Feature($pdo);
$object->getFeaturePost();
$feature = $object->getFeaturePost();
include 'includes/date.php';
?>

<main id="index-page">
    <div class="container">
        <article class="row feature-post">
            <div class="col-sm-12 col-md-12">
            <p><a href="views/single-post.php?posts_id=<?= $feature["posts_id"]; ?>">Read article</a></p>
            <div class="hero-image">
            <img src="<?= $feature["image"]; ?>" alt="feature-image">
            </div>
            <div class="date row justify-content-center">
            <div class="date-circle">
            <h6><?= $month; ?><br><?= $day; ?></h6>
            </div>
            </div>
            <h2 class="post-title"><?= $feature["title"]; ?></h2>
            <p class="post-description"><?= substr($feature["description"], 0, 150); ?></p>
            </div>
        </article> 
    </div>
        
        <?php 
        /*
        $object2 = new Feature($pdo);
        $object2->getLatestPosts();
        $latestPosts = $object2->getLatestPosts();
        var_dump($latestPosts);
        */
        ?>

        <!--
         <section class="row index-content">
            <div class="col-sm-12 col-md-12 col-lg-8 left-container">
                <div class="col-xs-11 col-md-4 col-lg-4">
                
                </div>
             
         </section> -->
    
</main>

<?php
include 'includes/footer.php';
?>