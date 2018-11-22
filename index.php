<?php
//Define the siteroot for includes/requires
$siteroot = ".";

//Page title
$page_title = 'Index';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Millhouse</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
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


        <div class="row">
            <div class="col-12"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, recusandae repudiandae numquam laudantium amet reprehenderit voluptate consequatur molestiae neque molestias magni, assumenda accusantium quaerat corporis! Voluptates, voluptatem? Quasi quam debitis, veritatis harum quod unde molestias aliquid ullam. Molestiae, dolorem illo?</p></div>
        </div>


        </main>
    
    <script src="main.js"></script>


<?php
include 'includes/footer.php';
?>