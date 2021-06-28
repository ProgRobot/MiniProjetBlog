<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="blogStyle.css">
    <title>Commentaires billet</title>
</head>

<body>

    <?php include 'elementsCommuns.php';

    echo "<a href=\"index.php\">Retour à la liste des billets</a>";

    echo "<div id=\"Billet\">
                <p id=\"titreBillet\">" . htmlspecialchars($_POST['titre']) . "  le  " . htmlspecialchars($_POST['dateCreation']) . "</p><br/>
                <p id=\"contenuBillet\">" . htmlspecialchars($_POST['contenu']) . "</p>
         </div>
         <h1>Commentaires</h1>";

    try {
        //Connexion à la base de donnée MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=dbblog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur' . $e->getMessage());
    }




    ?>
</body>

</html>