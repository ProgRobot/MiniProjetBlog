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

    try {
        //Connexion à la base de donnée MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=dbblog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur' . $e->getMessage());
    }


    //Reccupération des données du billet par son ID
    $req = $bdd->prepare('SELECT titre, contenu, dateCreation FROM dbblog.billets WHERE ID=:billet ');
    $req->execute(array('billet' => $_GET['billet']));

    $donnees = $req->fetch();

    //L'affichage du billet est inclu dans cette instruction echo
    echo "<a href=\"index2WithBD.php\">Retour à la liste des billets</a>
          <div id=\"Billet\">
                <p id=\"titreBillet\">" . htmlspecialchars($donnees['titre']) . " le " . $donnees['dateCreation'] . "</p>
                <p id=\"contenuBillet\">" . nl2br(htmlspecialchars($donnees['contenu'])) . "</p>
          </div>";

    //TODO reccupération des commentaires et leurs affichage.

    $req = $bdd->prepare('SELECT auteur, commentaire, date_commentaire FROM dbblog.commentaires WHERE id_billets=:billet ');
    $req->execute(array('billet' => $_GET['billet']));

    echo "<h1>Commentaires</h1>";

    while ($donnees = $req->fetch()) {
        echo "<b>" . htmlspecialchars($donnees['auteur']) . ":</b>" . " le " . $donnees['date_commentaire'] . "<br/>";
        echo $donnees['commentaire'] . "<br/>";
    }

    $req->closeCursor();
    ?>

</body>

</html>