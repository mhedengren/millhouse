<!DOCTYPE html>
<html lang="en">

<?php
    require "../includes/head.php"
?>

<body>

    <main class="container">

        <div class="card text-center">

            <h5 class="card-title">Login</h5>

            <form action="../includes/login.php" method="post" name="form">

                <div class="col-md-6 col-sm-6 col-xs-6 form-group">

                    <label for="login_username">Username</label>
                    <input type="text" class="form-control" name="login_username" id="login_username" placeholder="Your Username"
                        required>

                </div>

                <div class="col-md-6 col-sm-6 col-xs-6 form-group">

                    <label for="login_password">Password</label>
                    <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Your Password"
                        required>

                </div>

                <div class="col-md-6 col-sm-6 col-xs-6 form-group text-center">

                    <input type="submit" value="Login" class="btn">

                </div>

            </form>

            <a href="#" class="card-link">New? Sign up!</a>

        </div>

    </main>

<?php
    require "../includes/footer.php"
?>

</body>

</html>