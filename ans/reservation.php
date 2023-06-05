
<?php
session_start();
?>


<style>

    body {
        font-family: Arial, sans-serif;
    }

    form {
        width: 300px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-top: 20px;
    }

    input[type="date"],
    input[type="time"] {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
    }

    input[type="submit"] {
        display: block;
        margin-top: 20px;
        padding: 10px;
        width: 100%;
        background-color: #4CAF50;
        color: white;
        border: none;
    }
</style>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vue/css/style.css">
</head>
<body>

<?php
if(isset($_SESSION['email'])) {
    require_once("head_connexion.php");
} else {
    require_once("header.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "annexee";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];
        $room_type = $_POST["room_type"];

        $sql = "SELECT * FROM reservation 
                WHERE idSalle IN (SELECT idSalle FROM salle WHERE libelle = ?) 
                AND ((dateHeureDeboccup BETWEEN ? AND ?) OR (dateHeureDeboccup + INTERVAL heure_fin_occup HOUR BETWEEN ? AND ?))";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$room_type, $start_date, $end_date, $start_date, $end_date]);

        $result = $stmt->fetchAll();

        if (count($result) > 0) {
            echo "La salle n'est pas disponible pendant ce créneau horaire.";
        } else {
            // La salle est disponible, vous pouvez insérer la nouvelle réservation dans la base de données
            $insertSql = "INSERT INTO reservation (idUtilisateur, idSalle, dateHeureDeboccup, heure_deb_occup, nbPersonne, heure_fin_occup, etat)
                          VALUES (?, (SELECT idSalle FROM salle WHERE libelle = ?), ?, ?, ?, ?, 'Reservez')";

            $idUtilisateur = 1; // Remplacez par l'ID de l'utilisateur connecté ou récupérez-le à partir de la session
            $nbPersonne = 10; // Remplacez par le nombre de personnes pour la réservation

            $stmtInsert = $conn->prepare($insertSql);
            $stmtInsert->execute([$idUtilisateur, $room_type, $start_date, $start_time, $nbPersonne, $end_time]);

            echo "La réservation a été ajoutée avec succès !";
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<center><h1>Réservez votre salle ici :</h1></center>

<form action="" method="post">
    <label for="start_date">Date de début:</label><br>
    <input type="date" id="start_date" name="start_date"><br>

    <label for="end_date">Date de fin:</label><br>
    <input type="date" id="end_date" name="end_date"><br>

    <label for="start_time">Heure de début:</label><br>
    <input type="time" id="start_time" name="start_time"><br>

    <label for="end_time">Heure de fin:</label><br>
    <input type="time" id="end_time" name="end_time"><br>

    <label for="room_type">Type de salle:</label><br>
    <select id="room_type" name="room_type">
        <option value="small">Petite salle</option>
        <option value="medium">Salle moyenne</option>
        <option value="large">Grande salle</option>
    </select><br>

    <input type="submit" value="Réserver">
</form>
</body>
</html>
