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

    <div class="container"> 
        <div class="row">
            <div class="col-sm-12">
                <h1 class="all-categories">All categories</h1>
            </div>
        </div>

        <div class="row category-list">
            <?php foreach($categories as $category) : ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                  <?php if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"): ?>
                      <ul class="edit-remove-buttons">
                          <li class="list-inline-item edit-button">
                          <a href="../includes/posts.php?action=read_post&id=<?= $category["posts_id"]; ?>">
                              <i class="fas fa-pencil-alt"></i></a>
                           </li>
                          <li class="list-inline-item remove-button">
                              <a href="../includes/posts.php?action=delete_post&id=<?= $category["posts_id"]; ?>">
                              <i class="fas fa-times"></i></a>
                           </li>
                      </ul>
                  <?php endif; ?>
                <div class="category-card">
                        <a href="single-post.php?posts_id=<?= $category["posts_id"]; ?>">
                        <div class="gallery-hero-image">
                            <img src="../includes/<?= $category["image"]; ?>" alt="feature-image">
                        </div>
                        <div class="date row d-md-none justify-content-center">
                            <div class="date-circle">
                            <h6><?= $month; ?><br><?= $day; ?></h6>
                            </div>
                        </div>
                        <h2 class="gallery-post-title"><?= $category["title"]; ?></h2>
                        </a>
                        <p class="gallery-post-description">
                        <?= $category["description"]; ?>
                    </p>
                    <p class="read-more d-none d-md-block">
                        <a href="single-post.php?posts_id=<?= $category["posts_id"]; ?>">Read/comment article</a>
                    </p>
                    </div><!-- category-card -->
                </div><!-- col -->    
            
            <?php endforeach ;?>
        </div><!--- category-list -->

    </div>
     
</main>
<?php include '../includes/footer.php'; ?>


