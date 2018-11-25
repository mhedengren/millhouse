
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a href="<?= $siteroot; ?>/index.php" class="navbar-brand order-1"><img src="<?= $siteroot; ?>/images/logo.svg" alt="Home"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                 aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="<?= $siteroot; ?>/images/hamburger.svg" alt="hamburger-Menu">
                </button>
                    <div class="collapse navbar-collapse order-2" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                            <li class="nav-item d-lg-none">
                                <a class="nav-link nav-link-highlight" href="<?= $siteroot; ?>/views/login_form.php">LOGIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-highlight" href="<?= $siteroot; ?>/views/adminpage.php">ADMINPANEL</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">WATCHES <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $siteroot; ?>/views/single-post.php">SUNGLASSES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $siteroot; ?>/views/single-post.php">HOME DECOR</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= $siteroot; ?>/views/single-post.php">CATEGORIES</a>
                            </li>
                        </ul>
                    </div>
                        <div class="d-none d-lg-block order-3 login-div">
                            <button class="login-button">
                        <a href="<?= $siteroot; ?>/views/login_form.php">LOGIN</a>
                        </button>
                </div>
            </nav>
        </div>
    </header>

