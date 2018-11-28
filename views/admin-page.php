<?php
//Start session
session_start(); 

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
    
                    <form action="../includes/upload.php" method="POST" enctype="multipart/form-data" id="upload-form">
                        <label for="title">Title</label> 
                        <input type="text" id="title" name="postTitle" class="form-control" placeholder="Your title here" 
                        value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'><!-- if validation fails then show all content entered into the form's input and textarea -->
                        <label for="text">Text Body</label>
                        <textarea name="text" id="text" class="form-control"><?php if(isset($error)){ echo $_POST['text'];}?></textarea>
                        <input type="submit" name="submit" value="Send">
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
    <script>
        $(function() {
            $('div#froala-editor').froalaEditor({
                height: 400
            })
        });
    </script>

    <?php //include '../includes/footer.php'; ?>