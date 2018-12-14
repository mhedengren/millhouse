<?php
//Page title
$page_title = 'Categories'; 

//Includes session, database, config, classes
include '../includes/initialize.php';

//Redirect to login.php if user is not logged in
is_login('views/login-form.php');

$page_title = 'Categories'; 
//include '../includes/head.php';
include '../includes/header.php';

$object = new Posts($pdo);
$object->getAllCategories();
$categories = $object->getAllCategories();


?>

<main id="categories">  

    <div class="container-fluid"> 
        <div class="row"> 
            <div class="hero-image">

                <img src="../images/allcategories.jpg" alt="All the categories">
                <h1>ALL CATEGORIES</h1> 

            </div>
        </div>

        <div class="container p-0"> 
            <div class="row category-list">
                <?php foreach($categories as $post) : ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <?php include '../includes/date.php'; ?>
                        <?php if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"): ?>
                            <ul class="edit-remove-buttons">

                                <li class="list-inline-item edit-button">
                                    <a href="../includes/posts.php?action=read_post&id=<?= $post["posts_id"]; ?>">
                                    <i class="fas fa-pencil-alt"></i></a>
                                </li>

                                <li class="list-inline-item remove-button">
                                    <a href="../includes/posts.php?action=delete_post&id=<?= $post["posts_id"]; ?>">
                                    <i class="fas fa-times"></i></a>
                                </li>

                            </ul>
                        <?php endif; ?>

                        <div class="category-card">
                            <a href="single-post.php?posts_id=<?= $post["posts_id"]; ?>">

                                <div class="gallery-hero-image">
                                    <img src="../includes/<?= $post["image"]; ?>" alt="<?= $post["alt"]; ?>">
                                </div>

                                <div class="date row d-md-none justify-content-center">
                                    <div class="date-circle">
                                        <h6><?= $month; ?><br><?= $day; ?></h6>
                                    </div>
                                </div>

                                <h2 class="gallery-post-title"><?= $post["title"]; ?></h2>
                            </a>
                                
                            <p class="gallery-post-description">
                                <?= $post["description"]; ?>
                            </p>

                            <p class="read-more d-none d-md-block">
                                <a href="single-post.php?posts_id=<?= $post["posts_id"]; ?>">Read/comment article</a>
                            </p>

                        </div><!-- category-card -->
                    </div><!-- col -->       
                <?php endforeach ;?>
            </div><!--- category-list --->
        </div><!--- container p-0 --->
    </div><!--- container-fluid --->
    
</main>

<?php include '../includes/footer.php'; ?>


