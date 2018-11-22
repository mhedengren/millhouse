<!-- head require-->
<?php
//Define the siteroot for includes/requires
$siteroot = "..";

//Page title
$page_title = 'Register';


/*//Define the siteroot for includes/requires
$siteroot = "..";

//Page title
$page_title = 'Login';

//If already logged in skip log in again and jump to check out page directly.
if(isset($_SESSION["username"])){
    redirect_to('../index.php');
}

*/
?>

<?php    require '../includes/head.php'; ?>



<body>
    <main id="register"> 

        <div class="container row align-items-center align-items-center">
            <div class="contents">

                <!--  Register form  -->
                <h1>Sign up</h1>

                <form action="../includes/register.php" method="post" id="form_register">
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text" class="form-control" id="name" name="username" placeholder="Please enter User Name" required="required">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Please enter your email" required="required">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password must be longer than 6 charactors." required="required">
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
</body>
</html>