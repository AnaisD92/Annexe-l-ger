<?php
session_start();
ob_start();
require_once("controleur/config_db.php");
require_once("controleur/controleur.class.php");
$unControleur = new Controleur($serveur,$bdd,$user,$mdp);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="vue/css/style.css">
<link rel="stylesheet" href="vue/css/menu.css">

</head>
<body>
<?php
if(isset($_SESSION['email']))
{
    if($_SESSION['role'] == 'admin') {
        require_once("header_admin.php");
    } else {
        require_once("head_connexion.php");
    }
}
else {
    require_once("header.php");
}
?>
<br><br>
<?php
require_once("home.php");
?>
<br><br>
<?php
require_once("footer.php");
?>


</body>
</html>