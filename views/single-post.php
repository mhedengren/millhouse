<?php
//Start session
session_start(); 

//Defines site root

    include '../config.php';
    //Defines page title
    $page_title = "single-post";
    include '../includes/head.php';
    include '../includes/header.php';
    include '../includes/database-connection.php';
    include '../includes/select_feature_post.php';
    include '../classes/Feature.php';   
?>

<main class="container" id="single-post">
    <!--<div class="row">
        <div class="col-12">
            <img src="../images/hero-image.jpg" alt="woman's body in floral dress" class="single-post-image">
            <h2 class="article-title">How we dress for the season's best parties</h2>
            <br>
                <h4 class="article-date">November 22, 2018</h4>
        
        </div>    
    </div>-->
<?php
$object = new Feature($pdo);        
$post = $object->getFeaturePost();
?>
    <div class="hero-image-post-container row justify-content-center">
        <div class="feature-post col-10 text-center">
            <div class="hero-image">
                <img src="../<?= $post["image"]; ?>" alt="Hero-image">
            </div>
            <div class="date row justify-content-center">
                <div class="date-circle">    
                    <h6 class="post-date"><?= $post["created_on"]; ?></h6>
                </div>
            </div>
                    <h2 class="post-title"><?= $post["title"]; ?></h2>
                        
                    <p class="post-description"><b><?= substr($post["description"], 0, 50); ?></b></p>
                    <p class="post-description"><?= $post["description"]; ?></p>
                        
        </div>
    </div>
    
</main>

<?php
    include '../includes/footer.php';
?>    

