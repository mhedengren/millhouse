<?php
//Define the siteroot for includes/requires'
include 'config.php';

//Page title
$page_title = 'Index';

?>

<?php include 'includes/head.php'; ?>
<?php include 'includes/header.php';?>
<?php include 'includes/database-connection.php';?>
<?php include 'classes/Feature.php';?>

<?php 
$object = new Feature($pdo);
$object->getFeaturePost();
$post = $object->getFeaturePost();
?>

<main id="index-page">
    <div class="container">
        <article class="row feature-post">
            <div class="col-sm-12 col-md-12">
                <div class="hero-image">
                <img src="<?= $post["image"]; ?>" alt="feature-image">
                </div>
                    <div class="date row justify-content-center">
                        <div class="date-circle">
                        <h6><?= substr($post["created_on"], 8, 15); ?></h6>
                        </div>
                    </div>
                <h2 class="post-title"><?= $post["title"]; ?></h2>
                <p class="post-description"><?= substr($post["description"], 0, 150); ?></p>
            </div>
        </article>     
    </div>
</main>

<?php
include 'includes/footer.php';
?>