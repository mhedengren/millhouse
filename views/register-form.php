<!-- head require-->
<?php
//Start session
//session_start(); 

//Include for absolute path
include '../config.php';

//Page title
$page_title = 'Register';

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
                    echo display_errors($register->errors);
                }
                ?>

                <form action="register-form.php" method="post" id="form_register">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="name" name="register[username]" placeholder="Use at least 1 uppercase letter" required="required">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="register[email]" placeholder="Use 6 or more characters" required="required">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="register[password]" placeholder="Use at least 1 number." required="required">
                    </div>
                    <button type="submit" name="signup" class="btn button-color">SIGN UP</button>
                </form>

                <p>Already a member? Log in!</p>
                


                <!--  Display error message  if register is unsucceeded
If any of input forms are missing, redirect to the top of this page and show the error message.
Otherwise redirect to index.php top.-->
                <?php
                    //is_error("empty_error", "error", "exist_error", null);
                    //is_successfull("register", null, null, null);

                ?>          


            </div>



        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>