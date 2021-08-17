<?php

try {
    $pdo = new PDO('mysql:host=db.3wa.io;dbname=jordanyerbe_blog', 'jordanyerbe', '167ead298177d3bcd4ad53569b8c77be');
    $sql = "SELECT id,FirstName, LastName FROM Author";
            

            
            
} catch (PDOException $e) {
    print "Erreur :" . $e->getMessage();
    die();
};













?>