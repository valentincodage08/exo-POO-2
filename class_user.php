<?php
require_once('class_database.php');
session_start();
class User {

    private $_username;
    private $_password;

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
        $req = $bdd->prepare("INSERT INTO UserPOO (username, password)
                              VALUES (:username, :password)");
        $req->execute(array(
                ':username' => $this->_username,
                ':password' => $this->_password
        ));
        $req->closeCursor();
        header('location: inscrit.php');
    }

    public function str_random($length){
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }

}

?>