<?php
$object2 = new Feature($pdo);
$object2->getLatestPosts();
$latestPosts = $object2->getLatestPosts();
?>

      <section class="gallery row">
          <?php foreach ($latestPosts as $post) :?>
              <div class="col-sm-12 col-md-6">
                  <?php if(!isset($_SESSION['username'])): ?>
                  <?php else: ?>
                      <ul class="edit-remove-buttons">
                          <li class="list-inline-item edit-button">
                              <a href="includes/posts.php?action=edit_post&id=<?= $post["posts_id"]; ?>">
                              <i class="fas fa-pencil-alt"></i></a>
                           </li>
                          <li class="list-inline-item remove-button">
                              <a href="includes/posts.php?action=delete_post&id=<?= $post["posts_id"]; ?>">
                              <i class="fas fa-times"></i></a>
                           </li>
                      </ul>
                  <?php endif; ?>
                  <a href="views/single-post.php?posts_id=<?= $post["posts_id"]; ?>">
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
                      <a href="views/single-post.php?posts_id=<?= $post["posts_id"]; ?>">Read article</a>
                   </p>
              </div>
          <?php endforeach ;?>
      </section>