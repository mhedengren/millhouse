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
    //include '../classes/Comment.php';
    //$object2 = new Comments($pdo);        
    //$comment = $object2->addComment();

?>
<div class="container row">
    
<main class="container col-lg-8" id="single-post">
<!--this allows all info from a single post to be shown from the database-->
    <article class="hero-image-post-container row justify-content-center">
        <div class="feature-post col-10  text-center">
            <!--takes image from database-->
            <div class="hero-image">
                <img src="../includes/<?= $post["image"]; ?>" alt="Hero-image">
            </div>
            <!--takes date and displays clean from database-->
            <div class="date row justify-content-center">
                <div class="date-circle">    
                    <h6 class="post-date"><?= $month; ?><br><?= $day; ?></h6>
                </div>
            </div>
                <!--takes title from database up to 767.9px-->
                <h2 class="post-title-mobile d-md-none"><?= $post["title"]; ?></h2>
                <!--takes title from database for tablet and larger-->
                <h2 class="post-title d-none d-md-block"><span><?= $post["title"]; ?></span></h2>
                <!--takes title from database-->
                <p class="post-author d-none d-md-block"><?= $post["username"]; ?></p>
                <div class="row justify-content-center">
                    <div class="d-none d-md-block col-md-3 text-center">    
                        <hr class="before-post">
                    </div>        
                </div>
                <p class="post-description"><?= $post["description"]; ?></p> 
                <p class="post-content"><?= $post["content"]; ?></p>
                <p class="written-by d-md-none text-left">Written by</p>
                <p class="post-author-mobile d-md-none text-left"><?= $post["username"]; ?></p>                     
        </div>
    </article>
    <div class="row justify-content-center">
        <div class="d-lg-none col-lg-10 text-center">
            <hr class="after-post">
        </div>
    </div>
    
</main>

<?php include '../includes/aside.php'; ?>

</div>

    <div class="row justify-content-center">
        <div class="d-none d-lg-block col-lg-10 text-center">
            <hr class="after-post">
        </div>
    </div>

    <div class="comments-form row">
        <div class="col-9 text-center">
            <form action="../includes/comments.php" method="POST">
                <label for="write-comment"></label>
                <input type="hidden" name="posts_id" <?= $post["posts_id"]; ?>> 
                <input type="hidden" name="username" <?= $post["username"]; ?>>
                <input type="text" id="write-comment" placeholder="Write comment here....">
                <input type="submit" value="POST" id="post-comment" name="post-comment">
            </form>
        </div>
    </div>
    

<?php
var_dump($post["posts_id"]);
    include '../includes/footer.php';
?>    

