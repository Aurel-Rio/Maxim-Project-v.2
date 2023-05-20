<?php
include('../includes/navbar.php');
$servername = "qtxnahcriozacki0.mysql.db";
$username = "qtxnahcriozacki0";
$password = "Dominobae713";
$dbname = "qtxnahcriozacki0";

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}

// Exécution de la requête SQL
$sql = "SELECT id_exhibitions, titre, date, lieu, image, categorie FROM exhibitions;";
$result = mysqli_query($conn, $sql);

// Vérification des erreurs lors de l'exécution de la requête
if(!$result) {
    echo "Erreur : " . mysqli_error($conn);
    exit();
}

// Récupération des données de toutes les photos
$photos = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Création d'un tableau associatif qui associe les catégories à leurs descriptions
$categories = [
    "Art digital" => "Art digital",
    "Noir et Blanc" => "Noir & Blanc"
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

<!DOCTYPE html>
<html>
<head>
	<title>Galerie d'art</title>
	<link rel="stylesheet" href="../assets/css/reset.css">
	<link rel="stylesheet" href="../assets/css/footer.css">

</head>
<body>
    <section id='gallery'>
	<h2 id="secondary_title_style"><center>GALLERY</center></h2>

	<?php
	// Parcours des catégories et affichage des photos correspondantes
	foreach ($categories as $categorie => $description) {
	    echo "<h3 id='third_title_style'>$description</h3>";
	    echo "<ul>";
	    foreach ($photos_categorie[$categorie] as $photo) {
	        $id = $photo["id_exhibitions"];
	        $titre = $photo["titre"];
	        $date = $photo["date"];
	        $lieu = $photo["lieu"];
	        $image = $photo["image"];
	        $categorie = $photo["categorie"];
	        echo "<li><a href='sphoto.php?id=$id'><img src='$image' alt='$titre' width='100' height='100'><br/>$titre - $date - $lieu</a></li>";
	    }
	    echo "</ul>";
	}

	?>
</section>
</body>
<?php
	include('../includes/footer.php');
?>
</html>
