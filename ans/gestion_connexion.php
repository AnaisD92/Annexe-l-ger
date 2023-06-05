<?php
	require_once("controleur/controleur.class.php");
	require_once("controleur/config_db.php");
	//instanciation de la classe Controleur
	$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="vue/css/connect.css">
  <link rel="stylesheet" href="vue/css/style.css">

</head>
<body>
<?php
require_once("header.php");
?>

<?php

$error_message = "";

if (isset($_POST['SeConnecter']))
{
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    //vérification dans la base
    $chaine ="*";
    $where =array("email"=>$email, "mdp"=>$mdp);
    $unControleur->setTable ("utilisateur");
    $unUser = $unControleur->selectWhere($chaine, $where);

    if (isset($unUser['email'])){
        session_start();
        $_SESSION['email'] = $unUser['email'];
        $_SESSION['role'] = $unUser['role'];
        $_SESSION['nom'] = $unUser['nom']; // add this
        $_SESSION['prenom'] = $unUser['prenom']; // and this
        header("Location: index.php");
    }else{
        $error_message = "Veuillez vérifier vos identifiants";
    }
}

?>
<div class="login-page">
  <div class="form">
    <form class="login-form" action="" method="POST">
      <input type="text" placeholder="username" name="email">
      <input type="password" placeholder="password" name="mdp">
      <input type="submit" value="Connexion" name="SeConnecter">
      <p class="message">Not registered? <a href="#">Create an account</a></p>
        <?php if ($error_message): ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </form>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>


  <?php
require_once("footer.php");
?>
</body>
</html>
