<?php
// Inclusion du fichier de configuration de la base de données
require("../includes/config.php");
include('../includes/navbar.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <title>Expositions - Maxim Casino Armengol</title>
</head>
<body>


    <section id="accueil">
    <h1>Expositions</h1>
   
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
            echo "<li><a href='expositions.php?id="  . $row['id_exhibitions'] . "'>" . $row['titre'] . " - Du " . $formatDate . "</a></li>";
        }
        ?>
    </ul>
    </section>
</body>
</html>


<?php
include('../includes/footer.php');
?>
