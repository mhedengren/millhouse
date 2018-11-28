<?php
session_start();

//Define the siteroot for includes/requires'
include 'config.php';

//Page title
$page_title = 'Index';
include 'includes/head.php';
include 'includes/header.php';
include 'includes/database-connection.php';
include 'classes/Feature.php';

$object = new Feature($pdo);
$object->getFeaturePost();
$feature = $object->getFeaturePost();
include 'includes/date.php';
?>

<?php
$text = $feature["title"]; 
$titleWithWrap = wordwrap($text, 20, "<br />\n ");

//echo $titleWithWrap;
?>
<main id="index-page">
   <div class="container">
       <article class="row feature-post">
           <div class="col-sm-12 col-md-12">
           <div class="title-feature">
           <h6><?= $month; ?><?= $day ?><?= $year; ?></h6>
           <h2 class="big-post-title d-none d-md-block"><span><?= $feature["title"]; ?></span></h2>
           </div>
           <div class="hero-image">
           <img src="includes/<?= $feature["image"]; ?>" alt="feature-image">
           </div>
           <div class="date row justify-content-center">
           <div class="date-circle d-md-none">
           <h6><?= $month; ?><br><?= $day; ?></h6>
           </div>
           </div>
           <h2 class="post-title d-md-none"><?= $feature["title"]; ?></h2>
           <p class="post-description d-md-none"><?= substr($feature["description"], 0, 60); ?></p>
           </div>
       </article>
   </div>



<?php
$object2 = new Feature($pdo);
$object2->getLatestPosts();
$latestPosts = $object2->getLatestPosts();
?>

   <div class="container">
       <section class="row latest-posts">
           <?php foreach ($latestPosts as $post) :?>
           <div class="col-sm-12 col-md-6">
           <?php if(!isset($_SESSION['username'])): ?>
           <?php else: ?>
           <ul class="edit-remove-buttons">
               <li class="list-inline-item edit-button"><a href=""><i class="fas fa-pencil-alt"></i></a></li>
               <li class="list-inline-item remove-button"><a href=""><i class="far fa-trash-alt"></i></a></li>
           </ul>
           <?php endif; ?>
           <div class="hero-image-gallery">
           <img src="includes/<?= $post["image"]; ?>" alt="feature-image">
           </div>
           <div class="date row justify-content-center">
           <div class="date-circle d-md-none">
           <h6><?= $month; ?><br><?= $day; ?></h6>
           </div>
           </div>
           <h2 class="post-title-gallery"><?= $post["title"]; ?></h2>
           <p class="post-description-gallery"><?= substr($post["description"], 0, 75); ?></p>
           <p class="read-more d-none d-md-block"><a href="views/single-post.php?posts_id=<?= $post["posts_id"]; ?>">Read article</a></p>
           <!--<div class="row justify-content-center">
           <div class="col-6 d-md-none">
           <hr>
           </div>
           </div> -->
           </div>
           <?php endforeach ;?>
       </section>
   </div>
</main>

<?php
include 'includes/footer.php';
?>
