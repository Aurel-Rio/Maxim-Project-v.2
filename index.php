<?php
// Inclusion du fichier de configuration de la base de données
require_once("./includes/config.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Sélection de toutes les expositions
$sql = "SELECT * FROM exhibitions";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Accueil - Galerie de Maxim Casino Armengol</title>
</head>
<body>
    <h1>Expositions</h1>
    <ul>
        <?php
        // Affichage des expositions
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='exhibition.php?id="  . $row['id_exhibitions'] . "'>" . $row['titre'] . ' - ' . $row['lieu'] . "</a></li>";
        }
        ?>
    </ul>
</body>
</html>