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
        
        $object2 = new Feature($pdo);
        $object2->getLatestPosts();
        $latestPosts = $object2->getLatestPosts();
       // var_dump($latestPosts);
        
        ?>
        <div class="container">
        <section class="row latest-posts">
            <article class="col-sm-12">
                <?php foreach ($latestPosts as $post) :?>
                <div class="hero-image-small">
                <img src="<?= $post["image"]; ?>" alt="feature-image">
                </div>
                <h2 class="post-title"><?= $post["title"]; ?></h2>
                <p class="post-description"><?= substr($post["description"], 0, 100); ?></p>
                <hr>

                <?php endforeach ;?>
            </article>
        </section>
    </div>

     
    
</main>

<?php
include 'includes/footer.php';
?>