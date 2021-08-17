<?php 


include 'application/bdd_connection.php';
  
 

        

//         foreach($pdo->query($sql) as $results) {
     
//               $msg= test($results);
              

//         // Sélection et affichage du template PHTML.
       
//                                                  }


// function test($result){
    
//     $msg = $result['id'];
//     return $msg;
    
//                         }
                        
// $Author = $query->fetchAll(PDO::FETCH_ASSOC);
$query = $pdo->prepare
(
    'SELECT
      id,
      FirstName,
      LastName
     FROM Author'
    
);

$query->execute();
$Author = $query->fetchAll(PDO::FETCH_ASSOC);


$query = $pdo->prepare
(
    'SELECT
            Post.Id,
            Title,
            Contents,
            FirstName,
            LastName,
            Category.Name AS Category_Name
        FROM
            Post
        INNER JOIN
            Author
        ON
            Post.Author_Id = Author.id
        INNER JOIN
            Category
        ON
            Post.Category_Id = Category.id'
        
);

$query->execute();
$messages = $query->fetchAll();

$template = 'admin';
include 'layout.phtml';
?>