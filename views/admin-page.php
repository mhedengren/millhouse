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

            <!-- If we are sending a file in a form we must supply the extra attribute
            'encytype="multipart/form-data"', otherwise the file will be sent as a
            string and not uploaded to the server, otherwise the form is similar to every other form -->
            <form action="includes/upload.php" method="POST" enctype="multipart/form-data">
                <label for="image">Image</label>
                <!-- Use 'type="file"' to automatically create a input-field for uploads -->
                <input type="file" name="image" id="image">
                <label for="text">Image text</label>
                <!-- Use a textarea for a bigger input-field, put an ID on the area for the
                wysiwyg-editor to initialize on -->
                <textarea name="text" id="summernote"></textarea>
                <input type="submit" value="Send">
            </form>


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

  <!-- Link dependencies for the editor -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
  <script>
    /**
     * use the id of the textarea in the form to initialize this text-editor: #text
     */
    $(document).ready(function() {
      $('#text').summernote();
    });
  </script>

    <?php include '../includes/footer.php'; ?>