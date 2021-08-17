<?php

include 'application/bdd_connection.php';
    $query = $pdo->prepare
    (
        "DELETE FROM
            Post
        WHERE
            Id = ?
        "
    );

    $query->execute([$_GET['id']]);







    header('Location: admin.php');





?>