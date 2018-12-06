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
//this is my Comment class
include '../classes/Comment.php';
$comments = new Comments($pdo);
$read = $comments->readComments($_GET['posts_id']);

?>
<div class="container">

    <main class="row justify-content-center feature-post" id="single-post">
        <!--this allows all info from a single post to be shown from the database-->
        <article class="hero-image-post-container row justify-content-center">
            <div class="feature-post col-12  text-left">
                <!--takes image from database-->
                <div class="hero-image col-12">
                    <img src="../includes/<?= $post["image"]; ?>" alt="Hero-image">
                </div>
            </div>
            <div class="col-10">
                <!--takes date and displays clean from database-->
                <div class="row justify-content-center">
                    <div class="date-circle">    
                        <h6 class="post-date"><?= $month; ?><br><?= $day; ?></h6>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="date-author">    
                            <h2 class="post-date d-none d-md-block"><?= $month . " " . $day . ", " . $year . " - " . $post["username"] ?></h2>
                        </div>
                    </div>
                </div>
                <!--takes title from database up to 767.9px-->
                <h2 class="post-title-mobile d-md-none"><?= $post["title"]; ?></h2>
                <!--takes title from database for tablet and larger-->
                <div class="row d-flex justify-content-center">
                    <div class="col-12 post-title">
                        <h2 class="d-none d-md-block"><span><?= $post["title"]; ?></span></h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="d-none d-md-block col-md-3 text-center">    
                        <hr class="before-post">
                    </div>        
                </div>
                <h2 class="post-description"><?= $post["description"]; ?></h2> 
                <p class="post-content"><?= $post["content"]; ?></p>
                <p class="written-by d-md-none text-left">Written by</p>
                <p class="post-author-mobile d-md-none d-lg-block text-left"><?= $post["username"]; ?></p>                 
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

<div id="comments" class="container comment-container">

<div class="row">
    <div class="col-12">
        <h4>Comments (<?= count($read) ?>)</h4>
    </div>
</div>
    <?php foreach ($read as $single_comment) :?>
    <?php if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"): ?>
                  <div class="comment-field">
                      <ul class="edit-remove-buttons">
                          <li class="list-inline-item remove-button">
                          
                          <a href="../includes/comments.php?action=delete_comment&comments_id=<?= $single_comment["comments_id"]; ?>">    
                              <i class="fas fa-times"></i></a>
                           </li>
                      </ul>
                  <?php endif; ?>
                    <div class="row">
                        <div class="col-sm-2 comment-user">
                            <p><?= $single_comment["username"]; ?></p>
                            <div class="d-sm-none d-md-block comment-date">
                                <p><?= date('F d Y', strtotime($single_comment["created_on"])); ?></p>
                            </div>
                        </div>
                        <div class="col-sm-4 d-none d-sm-block d-md-none comment-date">
                            <p><?= date('F d Y', strtotime($single_comment["created_on"])); ?></p>
                        </div>
                        <div class="col-md-10 d-sm-none d-md-block comment-content">
                            <p><?=  $single_comment["content"]; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm d-none d-sm-block d-md-none comment-content">
                            <p><?=  $single_comment["content"]; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

    <div class="row justify-content-center">
        <div class="d-none d-lg-block col-lg-10 text-center">
            <hr class="after-post">
        </div>
    </div>

    <?php 
        if(!empty($comments->validation())){
            echo $comments->validation();
        }
    ?>    
    <div class="comments-form text-center">
        <?php if(isset($_SESSION['username'])) : ?>
        
            <form action="../includes/comments.php?action=create_comment" method="POST">
                <label for="write-comment"></label>
                <input type="hidden" name="posts_id" value="<?= $post['posts_id']; ?>"> 
                <textarea class="form-control" type="text" id="write-comment" name="content" placeholder="Write comment here...."></textarea>
                <input class="post-comment-btn" type="submit" value="POST" id="post-comment" name="post-comment">
            </form>
        
        <?php else: ?>
        <p>Please log in to comment</p>
        <?php endif; ?>
    </div>
</div>


    <?php

    include '../includes/footer.php';
    ?>    

