<?php
include dirname(__DIR__) .'/classes/Aside.php';

$object = new Aside($pdo);
$asidePosts = $object->getPostAside();

?>

<aside class="d-none d-md-block col-lg-4">
    <div class="container">
        <h2>TOP ARTICLES</h2>
        <hr>
        <div class="row latest-posts">
            <?php foreach ($asidePosts as $asidePost) :?>

            <a href="<?= $siteroot ?>/views/single-post.php?posts_id=<?= $asidePost["posts_id"]; ?>">
                <article class="col-6 col-md-12 row">
                    <div class="article-images col-4">
                        <img src="<?= $siteroot ?>/includes/<?= $asidePost["image"]; ?>" alt="<?= $asidePost["title"]; ?>">
                    </div>
                    <div class="article-contents col-7">
                        <h5 class="aside-post-title"><?= $asidePost["title"]; ?></h5>
                        <p><?= date('M d Y', strtotime($asidePost["created_on"])); ?></p>
                    </div>
                </article>
            </a>
            <?php endforeach ;?>
        </div>
        <hr>
        <h2>GET WEEKLY UPPDATES</h2>
        <div>
            <form action="#" method="post">
                <div class="form-group">
                    <label class="d-none" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email..." required="required">
                </div>
                <button type="submit" name="signup" class="btn button-color">SUBSCRIBE</button>
            </form>
        </div>
    </div>

</aside>