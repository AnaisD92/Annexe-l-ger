<?php
	require_once("controleur/controleur.class.php"); 
	require_once("controleur/config_db.php"); 
	//instanciation de la classe Controleur
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);

  $unControleur->setTable ("utilisateur");


?>

<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="vue/css/connect.css">
  <link rel="stylesheet" href="vue/css/style.css">
  <script src="vue/js/script.js"></script>

</head>
<body>
<?php
require_once("header.php");
?>
<!-- partial:index.partial.html -->
<!-- multistep form -->
<form id="msform" action="" method="POST">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Etape 1</h2>
    <h3 class="fs-subtitle">Vos informations personnelles</h3>
    <input type="text" name="nom" placeholder="Nom" />
    <input type="text" name="prenom" placeholder="Prenom" />
    <input type="date" name="dateNaiss" placeholder="Date de naissance" />
    <input type="text" name="classe" placeholder="Classe" />
    <input type="button" name="next" class="next action-button" value="Suivant" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Etape 2</h2>
    <h3 class="fs-subtitle">Vos identifiants</h3>
    <input type="email" name="email" placeholder="Email" />
    <input type="password" name="mdp" placeholder="Mot de passe" />
    <input type="tel" name="tel" placeholder="Téléphone" />
    <input type="button" name="previous" class="previous action-button" value="Precedent" />
    <input type="button" name="next" class="next action-button" value="Suivant" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Etape 3</h2>
    <h3 class="fs-subtitle">Votre adresse</h3>
    <input type="text" name="adresse" placeholder="Adresse" />
    <input type="text" name="cp" placeholder="Code Postal" />
    <input type="text" name="ville" placeholder="Ville" />
    <input type="button" name="previous" class="previous action-button" value="Precedent" />
    <input type="submit" class="submit action-button" name="valid" value="S'inscrire">
  </fieldset>
</form>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script  src="vue/js/script.js"></script>
<?php
 if (isset($_POST['valid']))
 {
   $tab=array(
     "nom"=>$_POST["nom"],
     "prenom"=>$_POST["prenom"], 
     "email"=>$_POST["email"],
     "dateNaiss"=>$_POST["dateNaiss"], 
     "classe"=>$_POST["classe"], 
     "adresse"=>$_POST["adresse"], 
     "cp"=>$_POST["cp"],
     "ville"=>$_POST["ville"], 
     "tel"=>$_POST["tel"], 
     "mdp"=>$_POST["mdp"]
   );
   $unControleur->insert ($tab);
   //var_dump($tab) ;
   header("Location: gestion_connexion.php");
 }
?>
<?php
require_once("footer.php");
?>
</body>
</html>