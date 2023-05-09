<?php
include('../includes/navbar.php');
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
$sql = "SELECT id_exhibitions, titre, date, image, categorie FROM exhibitions;";
$result = mysqli_query($conn, $sql);

// Vérification des erreurs lors de l'exécution de la requête
$photos = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Création d'un tableau associatif qui associe les catégories à leurs descriptions
$categories = [
    "art_digital" => "Art digital - Conceptuel, art moderne, travail sur Photoshop",
    "noir_blanc" => "Noir & Blanc - Photos de voyage, scènes de vie, portraits"
];

// Parcours des photos et création d'un tableau associatif qui associe chaque catégorie à un tableau contenant les photos correspondantes
$photos_categorie = [];
foreach ($photos as $photo) {
    $categorie = $photo["categorie"];
    if (!isset($photos_categorie[$categorie])) {
        $photos_categorie[$categorie] = [];
    }
    $photos_categorie[$categorie][] = $photo;
}
?>

<DOCTYPE html>
<h2 class="secondary_title_style"><center>GALLERY</center></h2>

<?php
// Parcours des catégories et affichage des photos correspondantes
foreach ($categories as $categorie => $description) {
    echo "<h3>$description</h3>";
    echo "<ul id='gallery'>";
    foreach ($photos_categorie[$categorie] as $photo) {
        $id = $photo["id_exhibitions"];
        $titre = $photo["titre"];
        $date = $photo["date"];
        $image = $photo["image"];
        $categorie = $photo["categorie"];
        echo "<li><a href='photo.php?id=$id'><br/><img src='$image' alt='$titre' width='100' height='100'><br/>$titre - $date</a></li>";
    }
    echo "</ul>";
}
include('../includes/footer.php');
?>
