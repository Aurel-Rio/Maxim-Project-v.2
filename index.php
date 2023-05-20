<?php
// Inclusion du fichier de configuration de la base de données
require_once("./includes/config.php");

// Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérification de l'accès à la page admin
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page === 'admin') {
        // Redirection vers la page de connexion admin si l'utilisateur n'est pas authentifié
        if (!isset($_SESSION['admin'])) {
            header('Location: index.php');
            exit;
        }
    }
} else {
    $page = 'accueil'; // Page par défaut
}

// Chargement de la page
switch ($page) {
    case 'accueil':
        include 'pages/accueil.php';
        break;
    case 'exhibitions':
        include 'pages/gallery.php';
        break;
    // Autres pages
    default:
        include 'pages/404.php';
        break;
}
?>
