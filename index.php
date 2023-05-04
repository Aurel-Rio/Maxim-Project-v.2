<?php
// Inclusion du fichier de configuration de la base de données
require_once("./includes/config.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Chargement de la page d'accueil
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';
switch ($page) {
    case 'accueil':
        include 'pages/accueil.php';
        break;
    case 'exhibitions':
        include 'pages/exhibitions.php';
        break;
    // Autres pages
    default:
        include 'pages/404.php';
        break;
}
