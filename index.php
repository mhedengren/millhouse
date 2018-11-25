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
        <article class="row justify-content-between feature-post">
            <?php
            //Looping only one post from db. (LIMIT 1)
            foreach ($all_posts as $post): ?>
                <div class="col-sm-12 col-md-8">
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
            <?php endforeach; ?> 
            
            <div class="col-xs-12 col-md-4">
            <h1>Dummy column text test</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, eveniet saepe fugiat sunt voluptatibus error sequi perferendis iure a aliquid illum nostrum quisquam odit cum neque culpa delectus illo nemo officiis pariatur nihil, obcaecati, voluptas esse temporibus! At harum ullam eveniet.</p></div>  
        </article>     
        
    </div>
</main>

<?php
include 'includes/footer.php';
?>