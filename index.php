<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blogStyle.css">
    <title>Acceuil blog</title>
</head>

<body>

    <?php include 'elementsCommuns.php' ?>

    <h3>Derniers billets du blog:</h3><br />

    <?php

    try {
        //Connexion à la base de donnée MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=dbblog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur' . $e->getMessage());
    }

    //Préparation puis exécution de la requette
    $req = $bdd->prepare('SELECT titre, contenu, dateCreation FROM dbblog.billets ORDER BY dateCreation DESC');
    $req->execute();

    while ($donnees = $req->fetch()) {
        //Envoi de données billet à travers un fomrulaire hidden et affichage du billet dans la page commentaires
        echo "<div id=\"Billet\">
                <p id=\"titreBillet\">" . htmlspecialchars($donnees['titre']) . " le " . $donnees['dateCreation'] . "</p>
                <p id=\"contenuBillet\">" . nl2br(htmlspecialchars($donnees['contenu'])) . "</p>
                <form action=\"commentaires.php\" method=\"post\"> 
                    <input type=\"hidden\" name=\"titre\" value = \"" . htmlspecialchars($donnees['titre']) . "\"" . ">
                    <input type=\"hidden\" name=\"dateCreation\" value = \"" . htmlspecialchars($donnees['dateCreation']) . "\"" . ">
                    <input type=\"hidden\" name=\"contenu\" value = \"" . htmlspecialchars($donnees['contenu']) . "\"" . ">
                    <input style=\"background-color: green; border: 1px solid black;\" type=\"submit\" value=\"Commentaires\">
                </form>
          </div>";
    }

    //Fin de boucles de billets
    $req->closeCursor();

    ?>

</body>

</html>