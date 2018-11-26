<?php
//Include for absolute path
include '../config.php';

//Page title
$page_title = 'Admin Panel';

include '../includes/head.php'; 
include '../includes/header.php';

?>

<body>

    <?php
  include 'partials/fetch_images.php';
  foreach($all_images as $image): ?>
    <div>
      <img src="<?= $image["image"]; ?>" alt="Cool image.">
      <div>
        <?= $image["text"]; ?>
      </div>
    </div>
  <?php
  endforeach;
  ?>

  <main>
    <!-- If we are sending a file in a form we must supply the extra attribute
         'encytype="multipart/form-data"', otherwise the file will be sent as a
         string and not uploaded to the server, otherwise the form is similar to every other form -->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
      <label for="image">Image</label>
      <!-- Use 'type="file"' to automatically create a input-field for uploads -->
      <input type="file" name="image" id="image">
      <label for="text">Image text</label>
      <!-- Use a textarea for a bigger input-field, put an ID on the area for the
           wysiwyg-editor to initialize on -->
      <textarea name="text" id="text" ></textarea>
      <input type="submit" value="Send">
    </form>
  </main>

  <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
 
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.1/js/froala_editor.pkgd.min.js"></script>
 
    <!-- Initialize the editor. -->
    <script> $(function() { $('textarea').froalaEditor() }); </script>


<?php include '../includes/footer.php'; ?>