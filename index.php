<?php
//Start session
session_start(); 

//Define the siteroot for includes/requires'
include 'config.php';

//Page title
$page_title = 'Index';

?>

<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php';?>
<?php include 'includes/database-connection.php';?>
<?php include 'classes/Feature.php';?>
<?php include 'includes/select_feature_post.php';?>






<?php 
$object = new Feature($pdo);
$object->getFeaturePost();
$post = $object->getFeaturePost();
$top_posts = $object->getPost();

//var_dump($top_posts);
?>


<main id="index-page">
    <div class="container">
        <article class="row feature-post">
            <?php
            //Looping only one post from db. (LIMIT 1)
            //foreach ($all_posts as $post): ?>
                <div class="col-sm-12 col-md-12">
                    <div class="hero-image">
                    <img src="<?= $post["image"]; ?>" alt="feature-image">
                    </div>
                        <div class="date row justify-content-center">
                        <div class="date-circle">
                        <h6><?= substr($post["created_on"], 5, 5); ?></h6>
                        </div>
                    </div>
                    <h2 class="post-title"><?= $post["title"]; ?></h2>
                    <p class="post-description"><?= substr($post["description"], 0, 150); ?></p>
                </div>
            <?php //endforeach; ?> 
        </article>     

        <article class="row feature-post">
            <?php   
            //Looping 4 posts from db. (LIMIT 4)
            foreach ($top_posts as $index_post): ?>
            <div class="col-sm-12 col-md-12">
                <div class="hero-image">
                    <img src="<?= $index_post["image"]; ?>" alt="feature-image">
                </div>
                <div class="date row justify-content-center">
                    <div class="date-circle">
                        <h6><?= substr($index_post["created_on"], 5, 5); ?></h6>
                    </div>
                </div>
                <h2 class="post-title"><?= $index_post["title"]; ?></h2>
                <p class="post-description"><?= substr($index_post["description"], 0, 150); ?></p>
            </div>
            <?php endforeach; ?> 
        </article>     

      
       
        </div>
</main>

<?php
include 'includes/footer.php';
?>