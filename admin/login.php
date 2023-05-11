<?php
require_once('../includes/config.php');

session_start();

if (isset($_POST['submit'])) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['mdp']);

    $stmt = $pdo->prepare("SELECT pseudo, mdp FROM admin WHERE pseudo = :pseudo");
    $stmt->execute(array(':pseudo' => $pseudo));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        $_SESSION['error'] = "Pseudo ou mot de passe incorrect";
        header('Location: ../index.php');
        exit();
    }

    if (!password_verify($mdp, $result['mdp'])) {
        $_SESSION['error'] = "Pseudo ou mot de passe incorrect";
        header('Location: ../index.php');
        exit();
    }

    // Si tout est bon, on redirige vers la page add_photo.php
    header('Location: add_photo.php');
    exit();
}
?>