<?php
//Page title
$page_title = 'Index';

//Includes session, database, config, classes
include 'includes/initialize.php';

//Redirect to login.php if user is not logged in
is_login('views/login-form.php');

include 'includes/header.php';
?>

<!-- Index Feature -->
<div class="container">

    <section class="row feature-post justify-content-center ">
        <div class="col-12">
        
            <!-- Tablet/Desktop feature --->
            <div class="main-feature-headings d-none d-md-block">
                <h6><?= $month . ' ' ?><?= $day . ', ' ?><?= $year; ?></h6>
                <h2><span class="bg-color"><?= $feature["title"]; ?></span></h2>
                <p class="read-more-desktop d-none d-md-block">
                <a href="views/single-post.php?posts_id=<?= $feature["posts_id"]; ?>">Read article</a>
                </p>
                <hr>
            </div>

            <?php if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"): ?>
                    <ul class="edit-remove-buttons">
                        <li class="list-inline-item edit-button">
                        <a href="includes/posts.php?action=read_post&id=<?= $feature["posts_id"]; ?>">
                        <i class="fas fa-pencil-alt"></i></a></li>
                        <li class="list-inline-item remove-button">
                        <a href="includes/posts.php?action=delete_post&id=<?= $feature["posts_id"]; ?>">
                        <i class="fas fa-times"></i></a></li>
                    </ul>
            <?php endif; ?>

            <a class="no-hover" href="views/single-post.php?posts_id=<?= $feature["posts_id"]; ?>">
                <!-- Hero image -->
                <div class="hero-image">
                <img src="includes/<?= $feature["image"]; ?>" alt="<?= $feature["alt"]; ?>">
                </div>
                
                <!-- Mobile feature -->
                <div class="date row justify-content-center">
                <div class="date-circle d-md-none">
                <h6><?= $month; ?><br><?= $day; ?></h6>
                </div>
                </div>
                <h2 class="feature-title-mobile d-md-none"><?= $feature["title"]; ?></h2>
                <p class="post-description d-md-none"><?= $feature["description"]; ?></p>
            </a>

        </div>
    </section>

</div>

<!-- Main section -->
<div class="main-container container">
    <div class="row">

        <main id="index-page" class="col-lg-8">

            <!-- Index Gallery -->
            <?php include 'includes/index-gallery.php'; ?>

        </main>
        
        <!-- Aside -->
        <?php include 'includes/aside.php'; ?>

    </div>
</div>
<?php include 'includes/footer.php'; ?>