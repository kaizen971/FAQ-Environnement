<?php 
include 'application/bdd_connection.php';
if(empty($_POST)){
    
    
    $query = $pdo->prepare
        (
            "SELECT
                Title,
                Contents,
                Category_Id
                
            FROM
                Post
            WHERE
                Id = ?
            "
        );
     $query->execute([$_GET['id']]);
        $message = $query->fetch();
        var_dump((int) $_GET['id']);
    
}else{
    
    $query = $pdo->prepare
        (
            "UPDATE
                Post
            SET
                Title = ?,
                Contents = ?
               
               
            WHERE
                Id = ?
            "
        );
    
    $query->execute([$_POST['title'], $_POST['contents'],(int) $_GET['id'] ]);
    
    header('Location: admin.php');
}





$template = 'edit_post';
include 'layout.phtml';
?>