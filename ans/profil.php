<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="vue/css/style.css">
    <style>
        .center-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .profile {
            text-align: center;
        }
        .profile-icon {
            font-size: 50px;
            margin-top: 20px;
        }

    </style>

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
<div class="profile">
    <h1>Profil</h1>
    <i class="bi bi-person-fill profile-icon"></i>
    <p>Nom: <span id="lastName"><?php echo isset($_SESSION["nom"]) ? htmlspecialchars($_SESSION["nom"]) : ''; ?></span></p>
    <p>Prénom: <span id="firstName"><?php echo isset($_SESSION["prenom"]) ? htmlspecialchars($_SESSION["prenom"]) : ''; ?></span></p>
    <p>Email: <span id="email"><?php echo isset($_SESSION["email"]) ? htmlspecialchars($_SESSION["email"]) : ''; ?></span></p>
    <form action="modifier_mot_de_passe.php" method="post">
        <button type="submit" id="changePasswordButton">Modifier le mot de passe</button>
    </form>

</div>

<br> <br> <br> <br> <br>
<?php
require_once("footer.php");
?>
</body>
</html>






