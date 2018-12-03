<?php
//Start session
session_start();

//Include for absolute path
include '../config.php';
require '../includes/database-connection.php';
include '../includes/functions.php';

//Page title
$page_title = 'Categories';

include '../includes/head.php'; 
include '../includes/header.php';

?>

<body>
    
    <main>

        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h1>Watches</h1>
                </div>
            </div>


            <?php
            $statement = $pdo->prepare(
            //"SELECT categories_id FROM categories WHERE category = 'accessories'"
            //'SELECT * FROM categories NATURAL JOIN post_category WHERE posts_id = 1'
            'SELECT '

            );

            $statement->execute();
        

            ?>

         unicorns
        </div> <!-- container -->  

    </main>

</body>