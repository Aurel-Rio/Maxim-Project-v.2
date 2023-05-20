<?php
// Inclusion du fichier de configuration de la base de données
require_once("./includes/config.php");

// Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérification de l'accès à la page admin
if ($page === 'admin') {
    // Redirection vers la page de connexion admin si l'utilisateur n'est pas authentifié
    if (!isset($_SESSION['admin'])) {
        header('Location: index.php');
        exit;
    }
}

// Chargement de la page d'accueil
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';
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
