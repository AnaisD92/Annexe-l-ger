<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Figtree:wght@300;600&amp;display=swap'>
<link rel="stylesheet" href="vue/css/style.css">
<link rel="stylesheet" href="vue/css/salle.css">
</head>
<body>

<?php
if(isset($_SESSION['email']))
{
    require_once("head_connexion.php"); 
}
else {
    require_once("header.php");
}
?>
<br><br>
<?php
require_once("vue/vue_liste_salles.php");
?>
<br><br>
<?php
require_once("footer.php");
?>
</body>
</html>