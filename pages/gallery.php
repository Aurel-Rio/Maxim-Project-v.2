

<?php
include('../includes/navbar.php');
include('../includes/footer.php');
$servername = "127.0.0.1";
$username = "riozacki";
$password = "Domino.bae.713";
$dbname = "maximarmengolcasino";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

// Exécution de la requête SQL
$sql = "SELECT id_exhibitions, titre, date, image FROM exhibitions;";
$result = mysqli_query($conn, $sql);

// Vérification des erreurs lors de l'exécution de la requête SQL
if(!$result) {
    echo "Erreur : " . mysqli_error($conn);
}

// Récupération des données de toutes les photos
$photos = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Affichage des données de toutes les photos dans une liste HTML
echo "<ul>";
foreach($photos as $photo) {
    $id = $photo["id_exhibitions"];
    $titre = $photo["titre"];
    $date = $photo["date"];
    $image = $photo["image"];
    echo "<li><a href='photo.php?id=$id'><img src='$image' alt='$titre' width='100' height='100'>$titre - $date</a></li>";
}
echo "</ul>";

?>