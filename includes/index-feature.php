<?php //Fetches the big feature on index.
$object = new Posts($pdo);
$object->getFeaturePost();
$feature = $object->getFeaturePost();

//Date to string conversion for index feature.
$date = $feature["created_on"];
$month = date('M', strtotime($date));
$day = date('j', strtotime($date));
$year = date('o', strtotime($date));

?>
    <section class="row feature-post justify-content-center ">
        <div class="col-12">
        
            <!-- Tablet/Desktop headings --->
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

            <!-- Post link -->
            <a class="no-hover" href="views/single-post.php?posts_id=<?= $feature["posts_id"]; ?>">

                <!-- Hero image -->
                <div class="hero-image">
                    <img src="includes/<?= $feature["image"]; ?>" alt="<?= $feature["alt"]; ?>">
                </div>
                
                <!-- Mobile headings -->
                <div class="date row justify-content-center">
                    <div class="date-circle d-md-none">
                        <h6><?= $month; ?><br><?= $day; ?></h6>
                    </div>
                </div>
                <h2 class="feature-title-mobile d-md-none"><?= $feature["title"]; ?></h2>

            </a>
                <p class="post-description d-md-none"><?= $feature["description"]; ?></p>

        </div>
    </section>