<?php
//pour pouvoir utiliser les sessions
session_start();
//token anti forgery (anti faille)
$token = uniqid();
//je le stock en session
$_SESSION["token"] = $token;
$title = "relever ";
?>
<?php
include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
$requette = $pdo->prepare("select * from eval");
$requette->execute();
$lignes = $requette->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/da7397688c.js" crossorigin="anonymous"></script>
    <title>Eval php</title>
</head>
<body>
<header id="header" class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary shadow">
        <div class="container-fluid m-2">
            <a class="navbar-brand secondary bg-light rounded p-2" href="index.html">Eval php</a>

        </div>
    </nav>
</header>
<main>
    <div class="container text-center">
        <h1>Données des plongeurs</h1>
    </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-around">
            <div class="container">

                <h4><u>Tableau de données</u></h4>
                <table class="table">
                    <thead>
                    <tr class="espace">
                        <th class="Date">Date</th>
                        <th class="Lieux">Lieux</th>
                        <th class="Relever">Relever</th>
                        <th class="Visualiser">Visualiser</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($lignes as $l) {
                        ?>
                        <tr>
                            <td><?php echo $l["dates"] ?></td>
                            <td><?php echo $l["lieux"] ?></td>
                            <td><?php echo $l["relever"] ?></td>
                            <td><a href="visualisation.php" class="btn btn-warning">Voir</a></td>
                        </tr>
                        <?php
                    }

                    ?>
                    </tbody>
                </table>
            </div>

            <form class="bg-light rounded shadow p-4 w-50 text-center" action="action/envoyeDonnees.php" method="post">
                <h2 class="mb-3">Ajoutez un relevé</h2>

                <h3>Date</h3>
                <input class="w-100 mb-2" type="date" name="dates" required>

                <h3>Lieux</h3>
                <input class="w-100 mb-2" type="text" name="lieux" required>

                <h3>Relevé</h3>
                <input class="w-100 mb-2" type="tel" name="relever">



                <input type="submit" class="mt-3 btn-primary btn" value="Envoyer">
            </form>
            <a href="visualisation.php?relever=876">
        </div>














