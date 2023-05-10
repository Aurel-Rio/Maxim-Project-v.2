<?php
    // Vérification de la soumission du formulaire
    if(isset($_POST["submit"])) {
        // Récupération des données du formulaire
        $titre = $_POST["titre"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $date_format = date("Y-m-d", strtotime($date));
        $lieu = $_POST["lieu"];
        $categorie = $_POST["categorie"]; // Nouvelle variable pour la catégorie
        
        // Vérification si un fichier a été téléchargé
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            // Récupération des informations sur le fichier
            $filename = $_FILES["image"]["name"];
            $filetype = $_FILES["image"]["type"];
            $filesize = $_FILES["image"]["size"];
            $filetmpname = $_FILES["image"]["tmp_name"];
            
            // Vérification du type de fichier
            $allowed_types = array("image/jpeg", "image/png");
            if(!in_array($filetype, $allowed_types)) {
                echo "Le type de fichier n'est pas autorisé.";
                exit;
            }
            
            // Vérification de la taille du fichier
            $maxsize = 2 * 1024 * 1024; // 2 Mo
            if($filesize > $maxsize) {
                echo "Le fichier est trop volumineux.";
                exit;
            }
            
            // Déplacement du fichier téléchargé
            $destination = "../upload/" . $filename;
            if(move_uploaded_file($filetmpname, $destination)) {
                // Connexion à la base de données
                $servername = "127.0.0.1";
                $username = "riozacki";
                $password = "Domino.bae.713";
                $dbname = "maximarmengolcasino";
                
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if(!$conn) {
                    die("Connexion échouée : " . mysqli_connect_error());
                }
                
                // Insertion des données dans la base de données avec la catégorie
                $sql = "INSERT INTO exhibitions (titre, description, date, lieu, image, categorie) VALUES ('$titre', '$description', '$date_format', '$lieu', '$destination', '$categorie')";
                
                if(mysqli_query($conn, $sql)) {
                    echo "L'exposition a été ajoutée avec succès.";
                } else {
                    echo "Erreur : " . mysqli_error($conn);
                }
                
                mysqli_close($conn);
            } else {
                echo "Une erreur est survenue lors du téléchargement du fichier.";
            }
        } else {
            echo "Veuillez sélectionner un fichier.";
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une photo - Galerie de Maxim Casino Armengol</title>
</head>
<body>
    <h1>Ajouter une photo</h1>
    <form method="POST" enctype="multipart/form-data">
        <label>Titre :</label><br>
        <input type="text" name="titre" required><br><br>
        <label>Description :</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>Date :</label><br>
        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" required><br><br>
        <label>Lieu :</label><br>
        <input type="text" name="lieu" required><br><br>
        <label>Catégorie :</label><br>
        <select name="categorie">
            <option value="Art digital">Art digital</option>
            <option value="Noir et Blanc">Noir & Blanc</option>
        </select><br><br>
        <label>Image :</label><br>
        <input type="file" name="image" accept="image/*" required><br><br>
        <input type="submit" name="submit" value="Ajouter">
    </form>
</body>
</html>