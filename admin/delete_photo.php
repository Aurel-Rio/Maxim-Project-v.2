<?php
// Vérification de la soumission du formulaire
if(isset($_POST["submit"])) {
    // Récupération de l'identifiant de la photo à supprimer
    $id = $_POST["id"];

    // Connexion à la base de données
    $servername = "127.0.0.1";
    $username = "riozacki";
    $password = "Domino.bae.713";
    $dbname = "maximarmengolcasino";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
    
    // Suppression de la photo dans la base de données
    $sql = "DELETE FROM exhibitions WHERE id = $id";
    
    if(mysqli_query($conn, $sql)) {
        echo "La photo a été supprimée avec succès.";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
<!-- Formulaire de suppression -->
<form method="post" action="">
    <label for="id">Identifiant de la photo :</label>
    <input type="number" name="id" required>
    <input type="submit" name="submit" value="Supprimer">
</form>
