<?php
// Inclusion du fichier de configuration de la base de données
require_once("./includes/config.php");
include('./includes/navbar.php');
include('./includes/footer.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <title>Accueil - Galerie de Maxim Casino Armengol</title>
</head>
<body>

    <section id="accueil">
    <h1>Bienvenue à la Galerie de Maxim Casino Armengol</h1>
    <p>Notre galerie d'art est heureuse de vous présenter ses dernières expositions. Nous travaillons avec les meilleurs artistes de la région pour vous proposer une expérience artistique unique.</p>
    <p>Parcourez notre sélection d'expositions en cours et à venir, et n'hésitez pas à nous contacter pour plus d'informations ou pour prendre rendez-vous avec l'un de nos conseillers en art.</p>
    <?php
    // Sélection de toutes les expositions
    $sql = "SELECT * FROM exhibitions";
    $result = mysqli_query($conn, $sql);
    ?>

    <h2>Expositions en cours</h2>
    <ul id="expo_accueil">
        <?php
        // Affichage des expositions en cours
        while ($row = mysqli_fetch_assoc($result)) {
        
            $date = date_create($row['date']);
            
            $formatDate = date_format($date, 'd/m/Y');
            echo "<li><a href='exhibition.php?id="  . $row['id_exhibitions'] . "'>" . $row['titre'] . " - Du " . $formatDate . "</a></li>";
        }
        ?>
    </ul>
    </section>
</body>
</html>
