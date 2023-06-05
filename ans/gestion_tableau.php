<style>
    h1.dashboard-header {
        color: #333;
        text-align: center;
        margin-top: 50px;
    }

    ul.dashboard-info {
        list-style-type: none;
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    ul.dashboard-info li {
        margin-bottom: 10px;
        font-size: 18px;
        color: #666;
    }

    ul.dashboard-info li:last-child {
        margin-bottom: 0;
    }
</style>



<?php
session_start();
ob_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    // Redirect non-admin users to homepage
    header('Location: index.php');
    exit();
}

require_once("controleur/controleur.class.php");
require_once("controleur/config_db.php");

$unControleur = new Controleur($serveur, $bdd, $user, $mdp);

// Get total number of users
$unControleur->setTable("utilisateur");
$totalUsers = $unControleur->count();

// Get total number of reservations
$unControleur->setTable("reservation");
$totalReservations = $unControleur->count();

// Get total number of rooms
$unControleur->setTable("salle");
$totalRooms = $unControleur->count();

require_once("header_admin.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="vue/css/style.css">
</head>
<body>
<h1 class="dashboard-header">Tableau de bord</h1>

<ul class="dashboard-info">
    <li>Nombre total d'utilisateurs: <?php echo $totalUsers; ?></li>
    <li>Nombre total de réservations: <?php echo $totalReservations; ?></li>
    <li>Nombre total de salles: <?php echo $totalRooms; ?></li>
</ul>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
require_once("footer.php");
?>
</body>
</html>
