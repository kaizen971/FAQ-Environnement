<?php 
include 'application/bdd_connection.php';

$query = $pdo->prepare
(
    "SELECT
         Title,
         Contents,
        TimeStamp,
         Category_Id
    FROM
        Post
    "
);

$query->execute();
$messages = $query->fetchAll();


$template = 'index';
include 'layout.phtml';
?>