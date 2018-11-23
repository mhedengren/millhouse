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

<main id="index-page">
    <div class="container">
        <div class="row feature-post">
                    <?php
                    //Looping only one post from db. (LIMIT 1)
                    foreach ($all_posts as $post): ?>
                    <div class="col-sm-12">
                            <div class="hero-image">
                            <img src="<?= $post["image"]; ?>" alt="Feature-image">
                            </div>
                            <div class="date-circle">
                            <h6 class=""><?= substr($post["created_on"], 8, 15); ?></h6>
                            </div>
                            <h2 class="post-title"><?= $post["title"]; ?></h2>
                            <p class="post-description"><?= substr($post["description"], 0, 400); ?></p>
                    </div>
                    <?php endforeach; ?>         
    </div>
</main>

<?php
include 'includes/footer.php';
?>