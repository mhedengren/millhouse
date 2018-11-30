<?php
//Start session
session_start();

//Include for absolute path
include '../config.php';

//Page title
$page_title = 'Login';

//Database connection
include '../includes/database-connection.php';

//Functions
include_once '../includes/functions.php';

//Logginin actions
include '../includes/register_log.php';


require "../includes/head.php"
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

                <form action="login-form2.php" class="login" method="post" id="form_login">

                    <div class="form-group">

                        <label for="login_username">Username</label>
                        <input type="text" class="form-control" name="username" id="login_username" placeholder="Your Username" required>
                        <label for="login_password">Password</label>
                        <input type="password" class="form-control" name="password" id="login_password" placeholder="Your Password" required>

                    </div>

                    <button type="submit" name="login" class="btn button-color">Login</button>

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