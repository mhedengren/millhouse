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