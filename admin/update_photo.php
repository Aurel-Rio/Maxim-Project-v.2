<?php
// Vérification de la soumission du formulaire
if(isset($_POST["submit"])) {
    // Récupération des données du formulaire
    $id = $_POST["id"];
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $lieu = $_POST["lieu"];
    
    // Connexion à la base de données
    $servername = "127.0.0.1";
    $username = "riozacki";
    $password = "Domino.bae.713";
    $dbname = "maximarmengolcasino";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
    
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
        $destination = "uploads/" . $filename;
        if(move_uploaded_file($filetmpname, $destination)) {
            // Mise à jour des données dans la base de données
            $sql = "UPDATE exhibitions SET titre='$titre', description='$description', date='$date', lieu='$lieu', image='$destination' WHERE id=$id";
            
            if(mysqli_query($conn, $sql)) {
                echo "L'exposition a été modifiée avec succès.";
            } else {
                echo "Erreur : " . mysqli_error($conn);
            }
        } else {
            echo "Une erreur est survenue lors du téléchargement du fichier.";
        }
    } else {
        // Mise à jour des données dans la base de données sans changer l'image
        $sql = "UPDATE exhibitions SET titre='$titre', description='$description', date='$date', lieu='$lieu' WHERE id=$id";
        
        if(mysqli_query($conn, $sql)) {
            echo "L'exposition a été modifiée avec succès.";
        } else {
            echo "Erreur : " . mysqli_error($conn);
        }
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modifier une exposition - MaximArmenGol</title>
</head>
<body>
	<h1>Modifier une exposition</h1>
	<form action="update_photo.php" method="post" enctype="multipart/form-data">
		<label for="id">Identifiant :</label>
		<input type="text" name="id" id="id"><br><br>
		
		<label for="titre">Titre :</label>
		<input type="text" name="titre" id="titre"><br><br>
		
		<label for="description">Description :</label>
		<textarea name="description" id="description" rows="5" cols="30"></textarea><br><br>
		
		<label for="date">Date :</label>
		<input type="date" name="date" id="date"><br><br>
		
		<label for="lieu">Lieu :</label>
		<input type="text" name="lieu" id="lieu"><br><br>
		
		<label for="image">Image :</label>
		<input type="file" name="image" id="image"><br><br>
		
		<input type="submit" name="submit" value="Modifier">
	</form>
</body>
</html>
