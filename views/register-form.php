<?php
//Start session
session_start(); 

//Include for absolute path
include '../config.php';

//Page title
$page_title = 'Sign in';

//Database connection
include '../includes/database-connection.php';

//Functions
include_once '../includes/functions.php';

//Registering actions
include '../includes/register.php';


/*
//If already logged in skip log in again and jump to check out page directly.
if(isset($_SESSION["username"])){
    redirect_to('../index.php');
}

*/
?>

<?php    include '../includes/head.php'; ?>

<body>

    <?php include "../includes/header.php"; ?>
    <main id="register-form"> 

        <div class="container row">
            <div class="contents">

                <!--  Register form  -->
                <h1>Sign up</h1>
                <?php
                //Shows the error message from validation only when $_POST is set
                if(isset($_POST['signup'])){
                    if(!empty($register->errors)){
                        echo display_errors($register->errors);
                    }
                }
                ?>

                <form action="register-form.php" method="post" id="form_register">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="name" name="register[username]" placeholder="Use at least 1 uppercase letter" required="required">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="register[email]" placeholder="Use 6 or more characters" required="required">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="register[password]" placeholder="Use at least 1 number" required="required">
                        <label for="password">Confirm password</label>
                        <input type="password" class="form-control" id="password" name="register[confirm_password]" placeholder="Enter your password again" required="required">
                    </div>
                    <button type="submit" name="signup" class="btn button-color">SIGN UP</button>
                </form>

                <p>Already a member? <a href="./login-form.php">Log in!</a></p>


            </div>



        </div>

    </main>
    <?php include "../includes/scripts.php"; ?>
</body>
</html>