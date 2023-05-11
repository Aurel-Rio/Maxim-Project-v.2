<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'maximarmengolcasino');
define('DB_USER', 'riozacki');
define('DB_PASSWORD', 'Domino.bae.713');

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

session_start();

echo "POST : ";
var_dump($_POST);

if (isset($_POST['submit'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['mdp']);

    echo "pseudo : " . $pseudo . "<br>";
    echo "mdp : " . $mdp . "<br>";

    $stmt = $pdo->prepare("SELECT pseudo, mdp FROM admin WHERE pseudo = :pseudo");
    $stmt->execute(array(':pseudo' => $pseudo));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($result);

    if (!$result) {
        $_SESSION['error'] = "Pseudo ou mot de passe incorrect";
        echo "Erreur de connexion : Pseudo ou mot de passe incorrect";
        header('Location: index.php');
        exit();
    }

    if (!password_verify($mdp, $result['mdp'])) {
        $_SESSION['error'] = "Pseudo ou mot de passe incorrect";
        echo "Erreur de connexion : Pseudo ou mot de passe incorrect";
        header('Location: index.php');
        exit();
    }

    // Si tout est bon, on redirige vers la page add_photo.php
    header('Location: http://127.0.0.1/MAXIM_ARMENGOL_CASINO_php_version/admin/add_photo.php');
    exit();
}

// Création d'un nouvel utilisateur 'MacSim' avec le mot de passe chiffré avec bcrypt
$pseudo = 'MacSim';
$mdp = 'MaCsIm.9.sav';
$mdp_hash = password_hash($mdp, PASSWORD_BCRYPT);

$stmt = $pdo->prepare("INSERT INTO admin (pseudo, mdp) VALUES (:pseudo, :mdp)");
$stmt->execute(array(':pseudo' => $pseudo, ':mdp' => $mdp_hash));