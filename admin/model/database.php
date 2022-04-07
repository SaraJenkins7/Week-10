<?php 
$dsn ='mysql:host=ckshdphy86qnz0bj.cbetxkdyhwsb.us-east-1.rds.amazonaws.com; dbname=h1xall3o7j8vdc8n';
$username = 'mn8vynzcixh6rrr5';
$password = 'kr4jjol9ok2abcux';

try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = 'Database Error';
    $error_message .= $e->getMessage();
    include('public/view/error.php');
    exit();
}

?>