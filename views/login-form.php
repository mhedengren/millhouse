<?php
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


                <a href="<?= $siteroot; ?>/views/register.php">New? Sign up!</a>


            </div>
        </div>
    </main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>