<?php
// Inclusion du fichier de configuration de la base de données

include('../includes/navbar.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <title>Contactez-moi - Maxim Casino Armengol</title>
</head>

<body>

    <section id="accueil" class="contact_style">
        <h4 style="color:grey">Si vous avez des questions, des commentaires ou des préoccupations, n'hésitez pas à me contacter par e-mail. Je ferai de mon mieux pour vous répondre dans les plus brefs délais. <br />
            <a href="mailto:maxim.c.a@live.fr">
                <bold> maxim.c.a@live.fr</bold>
            </a>
        </h4>
    </section>

    <?php
    include('../includes/footer.php');
    ?>

</body>

</html>