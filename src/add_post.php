<?php 
include 'application/bdd_connection.php';





if (isset($_POST) && !empty($_POST)){
 
$title = $_POST['title'];
$article = $_POST['contents'];
$auteur = $_POST['author'];
$date = date('d/m/Y');
$categorie = $_POST['category'];

$query = $pdo->prepare
(
    "INSERT INTO Post
    (Title, Contents,TimeStamp,Author_Id,Category_Id)
    VALUES ('$title','$article','$date','$auteur','$categorie')"
    
);

$query->execute();
$Authorcharact = $query->fetchAll(PDO::FETCH_ASSOC);
header('Location: admin.php');

}
else{

    
    $query = $pdo->prepare
(
    'SELECT
      Title,
      Contents,
      TimeStamp,
      Category_Id
     FROM Post
        WHERE Author_Id = ?'
);
    
$query->execute(array($_GET['AuthorId']));

$Author = $query->fetchAll(PDO::FETCH_ASSOC);
    

var_dump(($_GET['AuthorId']));


    $query = $pdo->prepare
    (
        'SELECT
          id,
          Name
         FROM Category'
        
    );
    
    $query->execute();

    $Category = $query->fetchAll(PDO::FETCH_ASSOC);
    
    
}




include 'application/bdd_connection.php';







/*En premier on prépare une requète SQL : PDO va nous renvoyer un Objet
Cet objet représente la requête SQL*/



//On demande à PDO d'éxécuter la requète mySQL


/* On récupère toutes les données renvoyées par mySQL
Pour celle ci on appelle la méthode fetchAll() qui récupère un tableau associatif:
    -les différentes lignes de données
    -les colonnes SQL de chaque ligne de données*/

 /* si on voulait qu'une seule ligne on aurait du faire un fetch() */   



$template = 'add_post';
include 'layout.phtml';
?>