<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php 
if(isset($_SESSION['username'])) {
  echo "Salut, ".$_SESSION['username']."!";
  echo "<a href='deconnexion.php'>Se déconnecter</a>";
} ?>
<?php if($_GET['success']==2) {
  echo "Y'a une couille dans le paté mec";
} 
elseif($_GET['success']==1) {
  echo "Ton mail a bien été confirmé";
} ?>
  <form action="connexiontraitement.php" method="POST">
    <input type="email" name="username" placeholder="Email">
    <input type="password" name="password" placeholder="Mot de passe">
    <button value="submit">Valider</button>
  </form>
</body>
</html>