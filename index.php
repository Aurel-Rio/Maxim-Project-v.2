<?php
// Inclusion du fichier de configuration de la base de données
require_once("./includes/config.php");

// Affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérification de l'accès à la route "/admin"
$url = $_SERVER['REQUEST_URI'];
$isAdminPage = strpos($url, '/admin/') !== false;

session_start();
if ($isAdminPage && !isset($_SESSION['admin'])) {
    // Rediriger l'utilisateur vers une autre page ou renvoyer une réponse d'erreur
    header('Location: /'); // Remplacez "/" par l'URL de la page vers laquelle vous souhaitez rediriger les utilisateurs non authentifiés
    exit;
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
