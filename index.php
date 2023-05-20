<?php
// Inclusion du fichier de configuration de la base de données
require_once("./includes/config.php");

// Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérification de l'accès à la route "/admin"
$url = $_SERVER['REQUEST_URI'];
$file = basename($url);
$isAdminPage = strpos($url, '/admin/') !== false && $file === 'login.php';
if ($isAdminPage) {
    // Vérifier si l'administrateur est connecté
    if (!$adminConnected) {
        // Rediriger l'utilisateur vers une autre page ou renvoyer une réponse d'erreur
        header('Location: /');
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
