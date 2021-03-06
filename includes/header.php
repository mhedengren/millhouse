<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a href="<?= $siteroot; ?>/index.php" class="navbar-brand order-1"><img src="<?= $siteroot; ?>/images/logo_dark.png" alt="Home"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <img src="<?= $siteroot; ?>/images/hamburger.svg" alt="hamburger-Menu">
            </button>
            <div class="collapse navbar-collapse order-2" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                    <?php if(!isset($_SESSION['username'])): ?>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link nav-link-highlight" href="<?= $siteroot; ?>/views/login-form.php">LOGIN</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link nav-link-highlight" href="<?= $siteroot; ?>/includes/logout.php">LOGOUT</a>
                    </li>
                    <?php endif; ?>
                    <?php
                    if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link nav-link-highlight" href="<?= $siteroot; ?>/views/admin-page.php">ADMINPANEL</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $siteroot; ?>/views/watches.php">WATCHES <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $siteroot; ?>/views/sunglasses.php">SUNGLASSES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $siteroot; ?>/views/home-decor.php">HOME DECOR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $siteroot; ?>/views/categories.php">CATEGORIES</a>
                    </li>
                </ul>
            </div>

            <div class="d-none d-lg-block order-3 login-div">
                <?php
                if(!isset($_SESSION['username'])):
                ?>
                <button class="login-button">
                    <a href="<?= $siteroot; ?>/views/login-form.php">LOGIN</a>
                </button>
                <?php
                else:
                ?>

                <button class="login-button">
                    <a href="<?= $siteroot; ?>/includes/logout.php">LOGOUT</a>
                </button>
                <?php
                endif;
                ?>
            </div>
        </nav>
    </div>
</header>
