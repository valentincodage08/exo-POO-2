<?php
session_start();
require_once('class_database.php');
require_once('class_user.php');

$connexion = new Database('db5000303630.hosting-data.io', 'dbs296617', 'dbu526536', '7f,7]WCg');
$bdd = $connexion->PDOConnexion();
$username = !empty($_POST['username']) ? $_POST['username'] : NULL;
$password = !empty($_POST['password']) ? $_POST['password'] : NULL;

$newuser = new User($username, $password);
$newuser->addUser($bdd);

?>