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
        // Si l'utilisateur n'existe pas, afficher un message d'erreur
        echo "Utilisateur non trouvé.";
        exit;
    }

    // Récupération des données de l'utilisateur
    $row = mysqli_fetch_assoc($result);

    // Vérification du mot de passe hashé
    if (!password_verify($mdp, $row["mdp"])) {
        // Mot de passe incorrect
        echo "Mot de passe incorrect.";
        exit;
    }

    // Authentification réussie, définir la session de l'administrateur
    session_start();
    $_SESSION['admin'] = true;

    // Redirection vers la page d'accueil de l'administration
    header("Location: add_photo.php");
    exit;
}
?>
