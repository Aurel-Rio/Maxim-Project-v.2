<?php
// Informations de connexion à la base de données
$host = "127.0.0.1"; // l'hôte base de données MySQL
$username = "riozacki"; // utilisateur MySQL
$password = "Domino.bae.713"; //mot de passe MySQL
$dbname = "maximarmengolcasino"; // nom base de données MySQL

// Connexion à la base de données
$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}
?>
