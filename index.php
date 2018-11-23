<?php
//Define the siteroot for includes/requires'
include 'config.php';

//Page title
$page_title = 'Index';

?>

<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php';?>
<?php include 'includes/database-connection.php';?>
<?php include 'includes/select_feature_post.php';?>

<main class="container">

    <div class="row">
                <?php
                //Looping only one post from db. (LIMIT 1)
                foreach ($all_posts as $post): ?>
                <div class="col-xs-12 hero-image-container">
                    <div class="col-xs-12 feature-post">
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
include 'includes/footer.php';
?>