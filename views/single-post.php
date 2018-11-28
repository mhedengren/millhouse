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
    //this is my SinglePost class 
    include '../classes/Single-post.php';
    //this initiates a new object
    $object = new SinglePost($pdo);        
    $post = $object->getSinglePost();
    include '../includes/date-single.php';

?>


<main class="container" id="single-post">
<!--this allows all info from a single post to be shown from the database-->
    <div class="hero-image-post-container row justify-content-center">
        <div class="feature-post col-10 text-center">
            <!--takes image from database-->
            <div class="hero-image">
                <img src="../<?= $post["image"]; ?>" alt="Hero-image">
            </div>
            <!--takes date and displays clean from database-->
            <div class="date row justify-content-center">
                <div class="date-circle">    
                    <h6 class="post-date"><?= $month; ?><br><?= $day; ?></h6>
                </div>
            </div>
                <!--takes title from database-->
                <h2 class="post-title"><span class="d-none d-md-block"><?= $post["title"]; ?></span></h2>
                <!--takes title from database-->
                <p class="post-author"><?= $post["username"]; ?></p>
                <div class="row justify-content-center">
                    <div class="d-none d-md-block col-md-3 text-center">    
                        <hr class="before-post">
                    </div>        
                </div>
                <p class="post-description"><b><?= substr($post["description"], 0, 50); ?></b></p>
                <p class="post-description"><?= $post["description"]; ?></p> 
                                     
        </div>
    </div>
    
</main>
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <hr class="after-post">
        </div>
    </div>

<?php
    include '../includes/footer.php';
?>    

