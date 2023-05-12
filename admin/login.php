<?php
// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Inclusion du fichier de configuration de la base de données
    require("../includes/config.php");

    // Récupération des valeurs des champs
    $pseudo = trim($_POST["pseudo"]);
    $mdp = $_POST["mdp"];

    // Vérification si l'utilisateur existe déjà
    $sql = "SELECT * FROM admin WHERE pseudo = '$pseudo'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        // Si l'utilisateur n'existe pas, on ajoute un nouvel utilisateur

        // Hashage du mot de passe en utilisant BCRYPT
        $hashed_password = password_hash("MaCsIm.9.sav", PASSWORD_BCRYPT);

        // Insertion dans la base de données
        $sql = "INSERT INTO admin (pseudo, mdp) VALUES ('MacSim', '$hashed_password')";
        if (!mysqli_query($conn, $sql)) {
            // Erreur lors de l'insertion dans la base de données
            echo "Erreur : " . mysqli_error($conn);
            exit;
        }
        echo "Nouvel utilisateur ajouté avec succès.<br>";
    } else {
        // Si l'utilisateur existe déjà, on vérifie le mot de passe

        // Récupération des données de l'utilisateur
        $row = mysqli_fetch_assoc($result);

        // Vérification du mot de passe hashé
        if (!password_verify($mdp, $row["mdp"])) {
            // Mot de passe incorrect
            echo "Mot de passe incorrect.";
            exit;
        }
        echo "Utilisateur existant vérifié avec succès.<br>";
    }

    // Redirection vers la page d'accueil de l'administration
    header("Location: add_photo.php");
    exit;
}
?>