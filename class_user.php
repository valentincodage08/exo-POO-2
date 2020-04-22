<?php
require_once('class_database.php');
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
        $req = $bdd->prepare("SELECT * FROM User WHERE username = :username AND password = :password");
        $req->execute(array(
                ':username' => $this->_username,
                ':password' => $this->_password
        ));
        
        $count = $req->rowCount();
        if($count > 0)  {
            session_start();
            $_SESSION['username'] = $this->_username;
            header('location:good.php');
        }
        else
        {
        header('location:mdpincorrect.php');
        }
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }

}

?>