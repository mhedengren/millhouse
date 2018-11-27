<?php
//Start session
session_start();

//Define the siteroot for includes/requires
    $siteroot = "..";

    //Page title
    $page_title = 'Login';

    require "../includes/head.php"
?>

<body>

    <?php include "../includes/header.php" ?>

    <main id="login">

        <div class="container row align-items-center">

            <div class="content">

                <!-- Login form -->
                <h1>Login</h1>

                <form action="../includes/login.php" class="login" method="post" id="form_login">

                    <div class="form-group">

                        <label for="login_username">Username</label>
                        <input type="text" class="form-control" name="login_username" id="login_username" placeholder="Your Username" required>
                        <label for="login_password">Password</label>
                        <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Your Password" required>

                    </div>

                    <button type="submit" class="btn button-color">Login</button>

                </form>


                <a href="<?= $siteroot; ?>/views/register-form.php">New? Sign up!</a>


            </div>
        </div>
    </main>

<?php
    require "../includes/scripts.php"
?>

</body>

</html>