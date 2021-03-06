<?php
//Page title
$page_title = 'Admin Panel';

//Includes session, database, config, classes
include '../includes/initialize.php';

//Redirect to login-form.php if an end user is logged in as a standard user
is_admin('login-form.php');

include '../includes/header.php';

$object = new Posts($pdo);        
$post = $object->readPost();

?>

<main id="admin-panel">

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1>Admin Panel</h1>
            </div>
        </div>

        <h2 class="add-new-post">Edit your post</h2>

        <div class="row new-post">
            <div class="col-sm-12 col-lg-8">

                <?php new_post_form_check(); ?>
                <form action="../includes/posts.php?action=update_post&id=<?= $post["posts_id"] ?>" method="POST" enctype="multipart/form-data" id="upload-form">

                    <label for="title">Title</label>
                    <input type="text" id="title" name="postTitle" value="<?= $post["title"] ?>" class="form-control" placeholder="Your title here"><!-- if validation fails then show all content entered into the form's input and textarea -->
                    <label for="desc">Description</label>
                    <input type="text" id="desc" name="postDesc" value="<?= $post["description"] ?>" class="form-control" placeholder="Your description here">
                    <!-- hidden post id value -->
                    <input hidden type="text" id="postId" name="postId" value="<?= $post["posts_id"] ?>" class="form-control" placeholder="Your description here">
                    <label for="content">Content</label>
                    <textarea name="postCont" id="content" class="form-control">  <?= $post["content"] ?> </textarea>

                </form>
            </div>

            <div class="col-sm-12 col-lg-4 mt-3 mt-lg-0">
                <div class="upload-image-form">

                    <?php upload_file_check(); ?>
                    <label for="upload-input" class="upload-label">Select Image</label>
                    <input type="file" class="input-file d-block" name="image" id="upload-input" form="upload-form" />
                    <label for="alt" class="alt-label d-inline d-xl-block">Image Title</label>
                    <input type="text" name="postAlt" id="alt" class="form-control" form="upload-form" value="<?= $post["alt"] ?>">
                    <hr>
                    <h4 class="upload-label">Select category</h4>
                    <select name="categories" form="upload-form" id="categories">

                        <option value="sunglasses">Sunglasses</option>
                        <option value="watches">Watches</option>
                        <option value="homedecor">Home Decor</option>
                        
                    </select>
                </div>
            </div>

            <div class="row submit-btn-area">
                <input type="submit" name="submit" class="admin-button" value="Update" form="upload-form">
            </div>

        </div><!-- row new-post -->

    </div><!-- container -->

</main>

<!-- Include external JS libs. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
    $(function () {
        $('textarea').froalaEditor()
    });
    $('textarea').froalaEditor({
            height: 400
    });
</script>
<?php include "../includes/scripts.php"; ?>

</body>
</html>