<!-- head require-->
<?php
//Start session
session_start(); 

//Include for absolute path
include '../config.php';

//Page title
$page_title = 'Register';

//Database connection
include '../includes/database-connection.php';

//Function
include '../includes/functions.php';

include '../classes/Register.php';
$register = new Register($pdo);


/*
include_once('functions.php');

include_once('functions.php');

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
                <?php echo display_errors($register->errors); ?>

                <form action="../includes/register.php" method="post" id="form_register">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="name" name="register[username]" placeholder="Please enter User Name" required="required">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="register[email]" placeholder="Please enter your email" required="required">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="register[password]" placeholder="Password must be longer than 6 charactors." required="required">
                    </div>
                    <button type="submit" class="btn button-color">SIGN UP</button>
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
    <?php include "../includes/footer.php"; ?>
</body>
</html>