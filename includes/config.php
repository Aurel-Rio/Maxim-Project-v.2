<?php
// Informations de connexion à la base de données
$host = "127.0.0.1"; // l'hôte base de données MySQL
$username = "riozacki"; // utilisateur MySQL
$password = "Domino.bae.713"; //mot de passe MySQL
$dbname = "maximarmengolcasino"; // nom base de données MySQL

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

?>
