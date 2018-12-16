<?php
//Page title
$page_title = 'Index';

//Includes session, database, config, classes
include 'includes/initialize.php';

//Redirect to login.php if user is not logged in
is_login('views/login-form.php');

include 'includes/header.php';
?>

<div class="container">

    <!-- Index Feature -->
    <?php include 'includes/index-feature.php'; ?>

</div>

<!-- Main -->
<div class="main-container container">
    <div class="row">

        <main id="index-page" class="col-lg-8">

            <!-- Index Gallery -->
            <?php include 'includes/index-gallery.php'; ?>

        </main>
        
        <!-- Aside -->
        <?php include 'includes/aside.php'; ?>

    </div>
</div>
<!-- Footer -->
<?php include 'includes/footer.php'; ?>