<?php
// Vérification de la soumission du formulaire
if(isset($_POST["submit"])) {
    // Récupération des identifiants des photos à supprimer
    $ids = $_POST["ids"];

    // Connexion à la base de données
    $servername = "127.0.0.1";
    $username = "riozacki";
    $password = "Domino.bae.713";
    $dbname = "maximarmengolcasino";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
    
    // Suppression des photos dans la base de données
    foreach($ids as $id) {
        $sql = "DELETE FROM exhibitions WHERE id_exhibitions = $id";
        mysqli_query($conn, $sql);
    }
    
    echo "Les photos ont été supprimées avec succès.";
    
    mysqli_close($conn);
}
?>
<!-- Formulaire de suppression -->
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="../assets/css/reset.css">
    </head>
<form method="post" action="" id="admin_style">
    <?php
    // Connexion à la base de données
    $servername = "127.0.0.1";
    $username = "riozacki";
    $password = "Domino.bae.713";
    $dbname = "maximarmengolcasino";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
    
    // Récupération de toutes les photos
    $sql = "SELECT id_exhibitions, titre, date, image FROM exhibitions;";
    $result = mysqli_query($conn, $sql);
    $photos = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // Affichage des photos avec des cases à cocher
    foreach($photos as $photo) {
        $id = $photo["id_exhibitions"];
        $titre = $photo["titre"];
        $date = $photo["date"];
        $image = $photo["image"];
        echo "<label><input type='checkbox' name='ids[]' value='$id'>$titre - $date</label><br>";
    }
    
    mysqli_close($conn);
    ?>

    <input type="submit" name="submit" value="Supprimer">
</form>
