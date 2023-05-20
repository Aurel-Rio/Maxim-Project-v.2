<?php
// Informations de connexion à la base de données
$host = "qtxnahcriozacki0.mysql.db"; // l'hôte base de données MySQL
$username = "qtxnahcriozacki0"; // utilisateur MySQL
$password = "Dominobae713"; //mot de passe MySQL
$dbname = "qtxnahcriozacki0"; // nom base de données MySQL

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

?>
