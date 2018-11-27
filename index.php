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
            <div class="date-circle d-md-none">
            <h6><?= $month; ?><br><?= $day; ?></h6>
            </div>
            </div>
            <h2 class="post-title"><?= $feature["title"]; ?></h2>
            <p class="post-description"><?= substr($feature["description"], 0, 60); ?></p>
            </div>
        </article> 
    </div>
        
<?php 
$object2 = new Feature($pdo);
$object2->getLatestPosts();
$latestPosts = $object2->getLatestPosts();
?>
      
    <div class="container">
        <section class="row latest-posts">
            <?php foreach ($latestPosts as $post) :?>
            <div class="col-sm-12 col-md-6">
            <div class="hero-image-gallery">
            <img src="<?= $post["image"]; ?>" alt="feature-image">
            </div>
            <div class="date row justify-content-center">
            <div class="date-circle d-md-none">
            <h6><?= $month; ?><br><?= $day; ?></h6>
            </div>
            </div>
            <h2 class="post-title-gallery"><?= $post["title"]; ?></h2>
            <p class="post-description-gallery"><?= substr($post["description"], 0, 75); ?></p>
            <p class="read-more"><a href="views/single-post.php?id=<?= $post["posts_id"]; ?>">Read article</a></p>
            <div class="row justify-content-center">
            <div class="col-6 d-md-none">
            <hr>
            </div>
            </div>
            </div>
            <?php endforeach ;?>
        </section>
    </div>
</main>

<?php
include 'includes/footer.php';
?>