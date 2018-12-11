<?php
//Defines page title
$page_title = "single-post";

//Includes session, database, config, classes
include '../includes/initialize.php';

//Redirect to login.php if user is not logged in
is_login('login-form.php');

include '../includes/header.php';
$object = new Posts($pdo);        
$post = $object->getSinglePost();
include '../includes/date.php';
include '../classes/Comment.php';
$comments = new Comments($pdo);
$read = $comments->readComments($_GET['posts_id']);
?>
<div class="container">

    <div class="row" id="single-post">
        <main class="col-lg-8">
            <!--this allows all info from a single post to be shown from the database-->
            <article class="hero-image-post-container row justify-content-center">
                <div class="feature-post hero-image col-sm-12">
                    <!--takes image from database-->
                    <img src="../includes/<?= $post["image"]; ?>" alt="Hero-image">
                    <!--takes title from database for tablet and larger-->
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 post-title">
                            <h2 class="d-none d-md-block"><span><?= $post["title"]; ?></span></h2>
                        </div>
                    </div>
                            <div class="date-author">    
                                <h2 class="post-date d-none d-md-block"><?= $month . " " . $day . ", " . $year . " - " . $post["username"] ?></h2>
                            </div>
                </div>
                <div class="col-12">
                    <!--takes date and displays clean from database-->
                    <div class="row justify-content-center">
                        <div class="date-circle">    
                            <h6 class="post-date"><?= $month; ?><br><?= $day; ?></h6>
                        </div>
                    </div>
                    <!--takes title from database up to 767.9px-->
                    <h2 class="post-title-mobile d-md-none"><?= $post["title"]; ?></h2>
                    <h2 class="post-description"><?= $post["description"]; ?></h2> 
                    <div class="row justify-content-center">
                        <div class="d-none d-md-block col-md-3 text-center">    
                            <hr class="before-post">
                        </div>        
                    </div>
                    <p class="post-content"><?= $post["content"]; ?></p>
                    <p class="written-by d-md-none text-left">Written by</p>
                    <p class="post-author-mobile d-md-none text-left"><?= $post["username"]; ?></p>                 
                </div>
            </article>
        
        </main>

        <?php include '../includes/aside.php'; ?>

    </div>


   <hr>

    <div id="comments" class="container comment-container">
       
        <div class="row justify-content-start">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-0 p-0">

        <div class="row">
            <div class="col-12">
                <h4>Comments (<?= count($read) ?>)</h4>
            </div>
        </div>
        <div>
            <?php foreach ($read as $single_comment) :?>

            <?php if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"): ?>

            <ul class="edit-remove-buttons">
                <li class="list-inline-item remove-button">


                    <a href="../includes/comments.php?action=delete_comment&post_id=<?= $post["posts_id"] ?>&comments_id=<?= $single_comment["comments_id"]; ?>">    
                        <i class="fas fa-times"></i></a>
                </li>
            </ul>
            <?php endif; ?>
            <div class="comment-field row">
                
                <div class="col-sm-4 comment-user">
                    <p><?= $single_comment["username"]; ?></p>
                    <div class="comment-date">
                        <p><?= date('F d Y', strtotime($single_comment["created_on"])); ?></p>
                    </div>
                </div>
               
                <div class="col-md-10 d-md-none d-lg-block comment-content">
                    <p><?=  $single_comment["content"]; ?></p>
                </div>
            </div>
            <div class="row hejsan">
                <div class="col-sm d-none d-md-block d-lg-none comment-content">
                    <p><?=  $single_comment["content"]; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


        <?php 
        new_comment_form_check();
        ?>    
        <div class="comments-form text-center">
            <?php if(isset($_SESSION['username'])) : ?>

            <form action="../includes/comments.php?action=create_comment&posts_id=<?= $post['posts_id']; ?>" method="POST">
                <label for="write-comment"></label>
                <input type="hidden" name="posts_id" value="<?= $post['posts_id']; ?>"> 
                <textarea class="form-control" type="text" id="write-comment" name="content" rows="5"  placeholder="Write comment here..."></textarea>
                <input class="post-comment-btn" type="submit" value="POST" id="post-comment" name="post-comment">
            </form>

            <?php else: ?>
            <div class="alert alert-danger text-center" role="alert">
                <p>Please log in to comment</p>
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>
</div>
        </div>



<?php

include '../includes/footer.php';
?>    

