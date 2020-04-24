<?php 

require_once('class_database.php');

$token = $_GET['token'];

$connexion = new Database('db5000303630.hosting-data.io', 'dbs296617', 'dbu526536', '7f,7]WCg');
$bdd = $connexion->PDOConnexion();

$req = $bdd->prepare("SELECT * FROM UserPOO WHERE token = '$token'");
$req->execute();

$req2 = $bdd->prepare("UPDATE UserPOO SET confirmed = 1 WHERE token = '$token'");
$req2->execute();
$req2->closeCursor();
$count = $req->rowCount();
        if($count > 0)  {
            header('location: index.php?success=1');
        }
        else {
            header('location: index.php?success=2');
        }
        $req->closeCursor();


?>