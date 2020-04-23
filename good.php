<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="height: 200px;"></div>
<?php echo "<br><br><p>YES tout est ok tu es connecté</p><br><a href='index.php'>Retour à l'accueil</a>";
echo $_SESSION['username']; ?>
<div style="height: 200px;"></div>
</body>
</html>
