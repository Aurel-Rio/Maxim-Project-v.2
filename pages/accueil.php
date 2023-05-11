<?php
// Inclusion du fichier de configuration de la base de données
require_once("./includes/config.php");
include('./includes/navbar.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <title>Accueil - Galerie de Maxim Casino Armengol</title>
</head>
<body>

    <section id="accueil_one">
        <h2>MAXIM CASINO ARMENGOL </h2> 
        <p>Né en 1986 à la Principauté d'Andorre et vivant en France depuis mes 4 ans, je suis dessinateur industriel de formation. Je suis également photographe autodidacte et paraplégique depuis de nombreuses années suite à un accident. À ma façon, je capture l'instant, les scènes de vie et les moments qui m'entourent pendant mes balades et mes voyages. Ici, je partage mon regard, ma vision que j'intitule "24 pouces", qui n'est autre que la dimension des roues de mon fauteuil roulant. À travers mon handicap et mon objectif, je prends des clichés pris sur le vif, car j'aime avant tout saisir l'instant présent. La photographie est pour moi un exutoire créatif et artistique qui me permet de m'évader, mais qui me permet également de repousser mes limites en termes d'accessibilité. À travers mes expositions, j'essaie de valoriser le handicap et l'art d'un tout autre point de vue.

À l'heure actuelle, nous valorisons une personne en situation de handicap grâce notamment au sport, qui est un très bon moyen d'ouvrir les consciences et de transmettre un message positif et d'espoir à tous ceux qui, du jour au lendemain, se retrouvent à faire face à un accident de la vie qui les amène malheureusement à être handicapés. Le handisport en l'occurrence est un vecteur d'intégration social indéniable. Étant moi-même licencié dans un club de handibasket, je ne peux que l'admettre. Cependant, durant mes 20 ans de paraplégie suite à un accident alors que j'étais adolescent, je constate aussi qu'il est parfois réducteur de mettre l'handicap dans une case, du moins de le cantonner ou de le mettre en lumière uniquement avec le sport, car être sportif n'est pas toujours facile en fonction de l'âge, du caractère, du lieu de vie et de bien d'autres éléments à prendre en compte.

Ma démarche ici est de faire voir que l'aspect culturel et artistique est également un vecteur d'intégration et que certaines passions nous amènent parfois à nous surpasser, même si à la fin nous n'avons pas de médaille.</p>   
</section>

    <section id="accueil_two">
    <h1>Bienvenue à la Galerie de Maxim Casino Armengol</h1>
    <p>Bienvenue à la Galerie de Maxim Casino Armengol ! Cette galerie met en avant le travail de Maxim, un photographe autodidacte et dessinateur industriel de formation. Malgré sa paraplégie suite à un accident, il capture des scènes de vie et des moments saisissants à travers son objectif, en mettant en avant sa vision unique qu'il intitule "24 pouces", en référence à la dimension des roues de son fauteuil roulant. Sa photographie est un exutoire créatif et artistique qui lui permet de repousser ses limites en termes d'accessibilité et de mettre en avant la valorisation du handicap d'un point de vue culturel et artistique. Nous vous invitons à découvrir ses œuvres qui reflètent sa passion et sa détermination à travers chaque cliché pris sur le vif.</p>
   
    <?php
    // Sélection de toutes les expositions
    $sql = "SELECT * FROM exhibitions";
    $result = mysqli_query($conn, $sql);
    ?>

    <h2>Expositions en cours</h2>
    <ul id="expo_accueil">
        <?php
        // Affichage des expositions en cours
        while ($row = mysqli_fetch_assoc($result)) {
        
            $date = date_create($row['date']);
            
            $formatDate = date_format($date, 'd/m/Y');
            echo "<li><a href='exhibition.php?id="  . $row['id_exhibitions'] . "'>" . $row['titre'] . " - Du " . $formatDate . "</a></li>";
        }
        ?>
    </ul>
    </section>

    <div id="form_admin" class="display_none">
        <form action="login.php" method="post">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username"><br>

            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password"><br>

            <input type="submit" value="Se connecter">
        </form>
        <br><br><br><br><br><br><br><br><br><br>
    </div>

</body>
</html>


<?php
include('./includes/footer.php');
?>
