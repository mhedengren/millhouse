<?php
    //Defines site root
    include '../config.php';
    //Defines page title
    $page_title = "single-post";
    include '../includes/head.php';
    include '../includes/header.php';
    include '../includes/database-connection.php';
    include '../includes/select_feature_post.php';   
?>

<main class="container">
    <!--<div class="row">
        <div class="col-12">
            <img src="../images/hero-image.jpg" alt="woman's body in floral dress" class="single-post-image">
            <h2 class="article-title">How we dress for the season's best parties</h2>
            <br>
                <h4 class="article-date">November 22, 2018</h4>
        
        </div>    
    </div>-->
    <div class="row justify-content-center">    
        <div class="col-10">
        <?php
                //Looping through all the posts from the db.
                foreach ($all_posts as $post): ?>
                <div class="hero-image-post-container">
                    <div class="feature-post">
                        <h2 class="post-name"><?= $post["title"]; ?></h2>
                        <h6 class="post-date"><?= $post["created_on"]; ?></h6>
                        <p class="post-description"><?= substr($post["description"], 0, 50); ?></p>
                        <img src="../<?= $post["image"]; ?>" alt="Hero-image">
                    </div>
                </div>
                <?php endforeach; ?>
    
</main>

<?php
    include '../includes/footer.php';
?>    

