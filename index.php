<?php
session_start();

//Define the siteroot for includes/requires'
include 'config.php';

//Page title
$page_title = 'Index';
include 'includes/head.php';
include 'includes/header.php';
include 'includes/database-connection.php';
include 'includes/functions.php';
include 'classes/Feature.php';
$object = new Feature($pdo);
$object->getFeaturePost();
$feature = $object->getFeaturePost();
include 'includes/date.php';
?>

  <div class="container">
       <article class="row feature-post">
           <div class="col-sm-12 col-md-12">
               <div class="main-feature-headings d-none d-md-block">
                   <h6><?= $month; ?><?= $day . ' ' ?><?= $year; ?></h6>
                   <h2><span class="bg-color"><?= $feature["title"]; ?></span></h2>
                   <p class="read-more-desktop d-none d-md-block">
                       <a href="views/single-post.php?posts_id=<?= $feature["posts_id"]; ?>">Read featured article!</a>
                    </p>
               </div>
               <div class="hero-image">
                   <img src="includes/<?= $feature["image"]; ?>" alt="feature-image">
               </div>
               <div class="date row justify-content-center">
                   <div class="date-circle d-md-none">
                       <h6><?= $month; ?><br><?= $day; ?></h6>
                   </div>
               </div>
               <h2 class="feature-title d-md-none"><?= $feature["title"]; ?></h2>
               <p class="post-description d-md-none"><?= $feature["description"]; ?></p>
           </div>
       </article>
   </div>

<div class="container main-container row">
    <main id="index-page" class="col-lg-8">
        <?php include 'includes/index-gallery.php'; ?>
    </main>
<?php include 'includes/aside.php'; ?>
</div>

<?php include 'includes/footer.php'; ?>
