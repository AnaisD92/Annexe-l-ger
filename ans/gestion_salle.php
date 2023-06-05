<?php
session_start();

require_once("controleur/controleur.class.php");
require_once("controleur/config_db.php");

$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
$unControleur->setTable("reservation");
$reservations = $unControleur->selectAll();

require_once("header_admin.php");
?>
<br><br>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="vue/css/style.css">
    <style>
        /* Ajoutez ici vos styles personnalisés */


        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            color: #000;
            text-decoration: none;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions {
            white-space: nowrap;
        }
    </style>
</head>
<body>

<table>
    <thead>
    <tr>
        <th>ID de la réservation</th>
        <th>ID de la salle</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Heure de début</th>
        <th>Heure de fin</th>
        <th>Type de salle</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reservations as $reservation): ?>
     
        <tr>
            <td><?php echo $reservation['idReservation']; ?></td>
            <td><?php echo $reservation['idSalle']; ?></td>
            <td><?php echo $reservation['dateHeureDeboccup']; ?></td>
            <td><?php echo $reservation['heure_deb_occup']; ?></td>
            <td><?php echo $reservation['heure_fin_occup']; ?></td>
            <td class="actions">
                <a href="modifier_reservation.php?id=<?php echo $reservation['idReservation']; ?>">Modifier</a>
                <a href="supprimer_reservation.php?id=<?php echo $reservation['idReservation']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br><br><br><br><br>
<?php
require_once("footer.php");
?>
