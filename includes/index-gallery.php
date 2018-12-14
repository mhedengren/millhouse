<?php
$object2 = new Posts($pdo);
$object2->getLatestPosts();
$latestPosts = $object2->getLatestPosts();
?>
<!-- Latest posts gallery -->
<section class="gallery row">

    <?php foreach ($latestPosts as $post) :?>
        <?php include 'date.php';?>
            <div class="col-sm-12 col-md-6 gallery-card">

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

                <a class="no-hover" href="views/single-post.php?posts_id=<?= $post["posts_id"]; ?>">

                    <!-- Gallery image -->
                    <div class="gallery-hero-image">
                        <img src="includes/<?= $post["image"]; ?>" alt="feature-image">
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
                        <a href="views/single-post.php?posts_id=<?= $post["posts_id"]; ?>">Read/comment article</a>
                    </p>

            </div>

    <?php endforeach ;?>
    
</section>