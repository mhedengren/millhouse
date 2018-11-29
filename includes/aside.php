<aside class="d-none d-md-block col-lg-4">
    <div class="container">
        <h5>TOP ARTICLES</h5>
        <hr>
        <div class="row latest-posts">
            <?php foreach ($latestPosts as $post) :?>
            <article class="col-6 col-md-12 row">
                <div class="article-images col-4">
                    <img src="includes/<?= $post["image"]; ?>" alt="<?= $post["title"]; ?>">
                </div>
                <div class="article-contents col-8">
                    <h2 class="post-title-gallery"><?= $post["title"]; ?></h2>
                    <p class=""><?= $month; ?><?= $day; ?></p>
                </div>
            </article>
            <?php endforeach ;?>
        </div>
        <hr>
        <h5>GET WEEKLY UPPDATES</h5>
        <div>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email..." required="required">
                </div>
                <button type="submit" name="signup" class="btn button-color">SUBSCRIBE</button>
            </form>
        </div>
    </div>

</aside>