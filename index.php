<?php
include 'includes/head.php';
?>

<main class="container">
        <header class="header row">
            <nav class="col-xs-6 d-md-none hamburger">     
                <button class="hamburger-button">
                    <img src="images/hamburger.svg" alt="hamburger-Menu">
                </button>
            </nav>
            <div class="col-xs-6 logo">
                    <img src="images/logo.svg" alt="millhouse-Logo">
            </div>
            <nav class="d-none d-md-block desktop-menu">     
                <ul>
                <li class="dekstop-item list-inline-item"> <a href="login.php">Beauty</a></li>
                <li class="dekstop-item list-inline-item"> <a href="login.php">Sunglasses</a></li>
                <li class="dekstop-item list-inline-item"> <a href="login.php">Home Decor</a></li>
                <li class="dekstop-item list-inline-item"> <a href="login.php">Categories</a></li>
                </ul>
            </nav>
        </header>
        <nav class="mobile d-md-none">
            <ul class="mobile-items">
                <li class="mobile-item"> <a href="login.php">Log in</a></li>
                <li class="mobile-item"> <a href="beauty.php">Beauty</a></li>
                <li class="mobile-item"> <a href="sunglasses.php">Sunglasses</a></li>
                <li class="mobile-item"> <a href="home_decor.php">Home Decor</a></li>
                <li class="mobile-item"> <a href="categories.php">Categories</a></li>
            </ul>
        </nav>
        </main>
    
    <script src="main.js"></script>


<?php
include 'includes/footer.php';
?>