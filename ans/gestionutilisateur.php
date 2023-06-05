<?php
session_start();
ob_start();

require_once("controleur/controleur.class.php");
require_once("controleur/config_db.php");

$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
$unControleur->setTable ("utilisateur");
$utilisateurs = $unControleur->selectAll(); // récupérer les utilisateurs

require_once("header_admin.php");
?>
<br> <br>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:hover {background-color: #f5f5f5;}
</style>
<!DOCTYPE html>
<html lang="fr" >
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="vue/css/style.css">
</head>
<body>

<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Date de naissance</th>
        <th>Classe</th>
        <th>Adresse</th>
        <th>Téléphone</th>
        <th>Ville</th>
        <th>Code Postal</th>
        <th>Sexe</th>
        <th>Pays</th>
        <th>Etat</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($utilisateurs as $utilisateur): ?>
        <tr>
            <td><?php echo $utilisateur['nom']; ?></td>
            <td><?php echo $utilisateur['prenom']; ?></td>
            <td><?php echo $utilisateur['email']; ?></td>
            <td><?php echo $utilisateur['dateNaiss']; ?></td>
            <td><?php echo $utilisateur['classe']; ?></td>
            <td><?php echo $utilisateur['adresse']; ?></td>
            <td><?php echo $utilisateur['tel']; ?></td>
            <td><?php echo $utilisateur['ville']; ?></td>
            <td><?php echo $utilisateur['cp']; ?></td>
            <td><?php echo $utilisateur['sex']; ?></td>
            <td><?php echo $utilisateur['pays']; ?></td>
            <td><?php echo $utilisateur['etat']; ?></td>
            <td><?php echo $utilisateur['role']; ?></td>
            <td>
                <a href="modifier.php?id=<?php echo $utilisateur['idUtilisateur']; ?>">Modifier</a>
                <a href="supprimer.php?id=<?php echo $utilisateur['idUtilisateur']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
require_once("footer.php");
?>
