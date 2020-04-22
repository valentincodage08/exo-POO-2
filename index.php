<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php session_start();
if(isset($_SESSION['username'])) {
  echo "Salut, ".$_SESSION['username']."!";
} ?>
  <form action="connexiontraitement.php" method="POST">
    <input type="text" name="username" placeholder="Nom d'utilisateur">
    <input type="password" name="password" placeholder="Mot de passe">
    <button value="submit">Valider</button>
  </form>
</body>
</html>