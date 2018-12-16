<?php
//Start session
session_start(); 

//Define absolute path
include dirname(__DIR__) .'/config.php';

//Include basic parts
include dirname(__FILE__).'/database-connection.php';
include_once dirname(__FILE__).'/functions.php';
include dirname(__FILE__).'/head.php';

//Include and call all post classes
include dirname(__DIR__).'/classes/Posts.php';
include dirname(__DIR__).'/classes/Register.php';

?>