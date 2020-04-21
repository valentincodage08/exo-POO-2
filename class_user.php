<?php

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
        $username = $this->_username;
        $password = $this->_password;
        $connectuser = $bdd->prepare("SELECT * FROM User WHERE username = '$username' AND password = '$password'");
        $connectuser->execute();
        return $connectuser->fetch();
        $connectuser->closeCursor();
    }

    public function getUsername() {
        return $this->_username;
    }

    public function getPassword() {
        return $this->_password;
    }

}

?>