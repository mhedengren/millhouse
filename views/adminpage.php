
<?php
//Define the siteroot for includes/requires
$siteroot = "..";

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
   
   <div class="row">
    <div class="col-sm-12 col-md-8">
     <h2>Add New Post</h2>
     <form action="">
      <div class="form-group">
       <label for="post-title">Title</label>
       <input type="text" class="form-control" id="post-title" placeholder="Enter title here">
      </div>
     </form>
    </div>
   </div>


  </div>
  
 </main>

</body>
</html>