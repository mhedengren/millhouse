<?php
//Include for absolute path
include '../config.php';

//Page title
$page_title = 'Admin Panel';

include '../includes/head.php'; 
include '../includes/header.php';

?>

<body>

    <main id="admin-panel">

        <div class="container">

            <div class="row">
                <div class="col-sm">
                    <h1>Admin Panel</h1>
                </div>
            </div>

           


            <!-- <div class="row new-post">
                <div class="col-sm-12 col-md-8">
                    <h2 class="add-new-post">Add New Post</h2>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="post-title">Title</label>
                            <input type="text" class="form-control" id="post-title" placeholder="Enter title here">
                        </div>
                        <div class="form-group">
                            <label for="text-area">Body</label>
                            <form method="post">
                                <textarea id="summernote" name="editordata"></textarea>
                            </form>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-4">
                    <form action="includes/upload.php" method="POST" enctype="multipart/form-data" class="upload-image-form">
                        <h3 class="featured-image">Featured Image</h3>
                        <h4 class="select-image">Select Image to Upload:</h4>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" name="submit" value="Upload Image">
                    </form>
                </div>

            </div>-->


        </div>

    </main>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>

    <?php include '../includes/footer.php'; ?>