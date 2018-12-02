<?php
//Start session
session_start();

//Define the siteroot for includes/requires
    include "../config.php";

    //Page title
    $page_title = 'Login';

    require "../includes/head.php";

    include "../includes/login.php";
?>

<body>

    <?php include "../includes/header.php" ?>

    <main id="login">

        <div class="container row align-items-center">

            <div class="content">

                <!-- Login form -->
                <h1>Login</h1>
                <?php
                //Shows the error message from validation only when $_POST is set
                    if(isset($_POST['login'])){
                        if(!empty($errors)){
                            echo display_errors($errors);
                        }
                    }
                    ?>

                <form action="login-form.php" class="login" method="post" id="form_login">

                    <div class="form-group">

                        <label for="login_username">Username</label>
                        <input type="text" class="form-control" name="login_username" id="login_username" placeholder="Your Username" required>
                        <label for="login_password">Password</label>
                        <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Your Password" required>

                    </div>

                    <button type="submit" name="login" class="btn button-color">LOGIN</button>

                </form>


               <p>New to the site? <a href="<?= $siteroot; ?>/views/register-form.php">Sign up!</a></p>


            </div>
        </div>
    </main>

<?php
    require "../includes/scripts.php"
?>

</body>

</html>