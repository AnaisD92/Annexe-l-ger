<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    // Si l'utilisateur n'est pas connecté en tant qu'admin, redirigez-le vers la page de connexion.
    header('Location: ../gestion_connexion.php');
    exit;
}
?>

<div id="nav-1">
    <a class="link-1" href="index.php">Accueil</a>
    <a class="link-1" href="gestion_tableau.php">Tableau de bord</a>
    <a class="link-1" href="gestion_salle.php">Gestion des Salles</a>
    <a class="link-1" href="gestion_FAQ.php">Gestion F.A.Q</a>
    <a class="link-1" href="gestionutilisateur.php">Gestion des Utilisateurs</a>
    <a class="link-1" href="deconnexion.php">Déconnexion</a>
</div>
