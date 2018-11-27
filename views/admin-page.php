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

            <div class="row new-post">
                <div class="col-sm-12 col-md-8">
                    <h2 class="add-new-post">Add New Post</h2>
                    <!-- If we are sending a file in a form we must supply the extra attribute
                    'encytype="multipart/form-data"', otherwise the file will be sent as a
                    string and not uploaded to the server, otherwise the form is similar to every other form -->
                    <form action="../includes/upload.php" method="POST" enctype="multipart/form-data" id="upload-form">
                        <!-- Use a textarea for a bigger input-field, put an ID on the area for the
                        wysiwyg-editor to initialize on -->
                         <label for="text">Text Body</label>
                        <textarea name="text" id="text"></textarea>
                        <input type="submit" value="Send">
                    </form>
                </div>
                 <div class="col-sm-12 col-md-4">
                    <div class="upload-image-form">
                        <label class="featured-image" for="image">Featured Image<label>
                        <h4 class="select-image">Select Image to Upload:</h4>
                        <input type="file" name="image" id="image" form="upload-form"> 
                    </div>
                </div>

            </div>

        </div>

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
    </script>

    <?php //include '../includes/footer.php'; ?>