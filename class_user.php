<?php
session_start();
require_once('class_database.php');
class User {

    private $_username;
    private $_password;
    private $_token;

    public function __construct($_username, $_password) {
        $this->_username = $_username;
        $this->_password = $_password;
    }

    public function affiche() {
        echo "Votre username : ".$this->_username."<br>";
        echo "Votre mot de passe : ".$this->_password."<br><br>";
    }

    // Fonction permettant de se connecter à la table user
    public function connectUser($bdd) {
        $req = $bdd->prepare("SELECT * FROM UserPOO WHERE username = :username AND password = :password");
        $req->execute(array(
                ':username' => $this->_username,
                ':password' => $this->_password
        ));
        
        $count = $req->rowCount();
        if($count > 0)  {
            session_start();
            $_SESSION['username'] = $this->_username;
            header('Location:good.php');
        }
        else
        {
        header('Location:mdpincorrect.php');
        }
        $req->closeCursor();
    }

    public function addUser($bdd) {
        $req = $bdd->prepare("INSERT INTO UserPOO (username, password, token, confirmed)
                              VALUES (:username, :password, :token, 0)");
        $req->execute(array(
                ':username' => $this->_username,
                ':password' => $this->_password,
                ':token' => $token = substr(str_shuffle(str_repeat("0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN", 32)), 0, 32)
        ));
        $req->closeCursor();
        mail($this->_username, "Veuillez confirmer votre mail", "Veuillez confirmer votre mail en cliquant ici : http://demandat.simplon-charleville.fr/exo-POO-2/confirm.php?token=$token");
        header('location: inscrit.php');
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }

}

?>