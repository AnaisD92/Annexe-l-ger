<div id="nav-1">
	<a class="link-1" href="index.php">Accueil</a>
	<a class="link-1" href="salles.php">Salles</a>
	<a class="link-1" href="faq.php">F.A.Q</a>
	<a class="link-1" href="contact.php">Contact</a>
	<?php
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
		echo '<a class="link-1" href="profil.php">Profil (' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ')</a>';
	}
	?>
	<a class="link-1" href="deconnexion.php">Deconnexion</a>
</div>
