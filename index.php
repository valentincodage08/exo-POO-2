<?php

require_once('class_database.php');
require_once('class_user.php');

  $connexion = new Database('db5000303630.hosting-data.io', 'dbs296617', 'dbu526536', '7f,7]WCg');
  $bdd = $connexion->PDOConnexion();

  $req = $bdd->prepare('SELECT * from User');
        $req->execute();
        
        $req = $req->fetch();
        
        $username = $req['username'];
        $password = $req['password'];

        $user = new User($username, $password);
        
        $user->affiche();

  $newuser = new User('Charles', 'test');
  $newuser->affiche();

  $reqconnectuser = $newuser->connectUser($bdd);
  echo "connecté";

  // TODO : récupérer vérif.php du projet vod et l'adapter à la POO pour un connect user 100 % fonctionnel

?>