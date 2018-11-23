  <?php 
include 'database-connection.php';

//Fetching the products from database.
$statement = $pdo->prepare("SELECT * FROM posts");
//Execute it
$statement->execute();
//And fetch every row that it returns. $products is now an Associative array
$all_posts = $statement->fetchAll(PDO::FETCH_ASSOC);
 
?>