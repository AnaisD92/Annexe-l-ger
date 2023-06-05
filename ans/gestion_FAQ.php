<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

// Inclure les fichiers nécessaires
require_once("controleur/controleur.class.php");
require_once("controleur/config_db.php");

// Créer une instance du contrôleur
$unControleur = new Controleur($serveur, $bdd, $user, $mdp);
$unControleur->setTable("contacts");

// Récupérer toutes les demandes de la FAQ
$demandes = $unControleur->selectAll();

// Vérifier si le formulaire de réponse est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['repondre'])) {
    $demandeId = $_POST['demande_id'];
    $reponse = $_POST['reponse'];

    // Mettre à jour la demande avec la réponse
    $unControleur->update($demandeId, ['reponse' => $reponse]);

    // Rediriger vers la page de gestion des FAQ
    header("Location: gestion_FAQ.php");
    exit();
}

require_once("header_admin.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion FAQ</title>
    <link rel="stylesheet" href="vue/css/style.css">
</head>
<body>
<div class="container">
    <h2>Gestion des demandes de la FAQ</h2>

    <?php if (count($demandes) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>ID de la demande</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Site web</th>
                <th>Message</th>
                <th>Réponse</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($demandes as $demande): ?>
                <tr>
                    <td><?php echo $demande['idContact']; ?></td>
                    <td><?php echo $demande['name']; ?></td>
                    <td><?php echo $demande['email']; ?></td>
                    <td><?php echo $demande['phone']; ?></td>
                    <td><?php echo $demande['website']; ?></td>
                    <td><?php echo $demande['message']; ?></td>
                    <td><?php echo $demande['reponse']; ?></td>
                    <td>
                        <?php if (empty($demande['reponse'])): ?>
                            <button class="repondre" data-demande-id="<?php echo $demande['idContact']; ?>">Répondre</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div id="reponse-form" style="display: none;">
            <h3>Répondre à la demande</h3>
            <form action="" method="post">
                <input type="hidden" id="demande-id-input" name="demande_id" value="">
                <fieldset>
                    <textarea name="reponse" placeholder="Réponse" required></textarea>
                </fieldset>
                <fieldset>
                    <button type="submit" name="repondre">Envoyer</button>
                </fieldset>
            </form>
        </div>

        <script>
            var repondreButtons = document.querySelectorAll('.repondre');
            var reponseForm = document.getElementById('reponse-form');
            var demandeIdInput = document.getElementById('demande-id-input');

            repondreButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var demandeId = this.getAttribute('data-demande-id');
                    demandeIdInput.value = demandeId;
                    reponseForm.style.display = 'block';
                });
            });
        </script>

    <?php else: ?>
        <p>Aucune demande de FAQ n'a été soumise.</p>
    <?php endif; ?>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once("footer.php"); ?>
</body>
</html>
