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
                    <a href="index.php"><img src="images/logo.svg" alt="Home"></a>
            </div>
            <nav class="d-none d-md-block desktop-menu">     
                <ul>
                <li class="dekstop-item list-inline-item"> <a href="login.php">WATCHES</a></li>
                <li class="dekstop-item list-inline-item"> <a href="login.php">SUNGLASSES</a></li>
                <li class="dekstop-item list-inline-item"> <a href="login.php">HOME DECOR</a></li>
                </ul>
            </nav>
            <button class="d-none d-md-block login-button">
                    <a href="login.php">LOGIN</a>
                </button>
        </header>
        <nav class="mobile d-md-none">
            <ul class="mobile-items">
                <li class="mobile-item"> <a href="login.php">LOGIN</a></li>
                <li class="mobile-item"> <a href="watches.php">WATCHES</a></li>
                <li class="mobile-item"> <a href="sunglasses.php">SUNGLASSES</a></li>
                <li class="mobile-item"> <a href="home_decor.php">HOME DECOR</a></li>
                <li class="mobile-item"> <a href="categories.php">CATEGORIES</a></li>
            </ul>
        </nav>
        </main>
    
    <script src="main.js"></script>


<?php
include 'includes/footer.php';
?>