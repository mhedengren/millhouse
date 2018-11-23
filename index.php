<?php
//Define the siteroot for includes/requires
$siteroot = ".";

//Page title
$page_title = 'Index';

?>

<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php';?>
<?php include 'includes/database-connection.php';?>
<?php include 'includes/select_feature_post.php';?>

<main class="container">
    <div class="row justify-content-center">

                <?php
                //Looping through all the posts from the db.
                foreach ($all_posts as $post): ?>
                <div class="hero-image-post-container">
                    <div class="feature-post">
                        <h2 class="post-name"><?= $post["title"]; ?></h2>
                        <h6 class="post-date"><?= $post["created_on"]; ?></h6>
                        <p class="post-description"><?= substr($post["description"], 0, 50); ?></p>
                        <img src="<?= $post["image"]; ?>" alt="Hero-image">
                    </div>
                </div>
                <?php endforeach; ?>
                
    </div>
</main>

<?php
//include 'includes/footer.php';
?>