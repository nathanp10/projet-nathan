<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/da7397688c.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><i class="fad fa-cat-space fa-2x"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!--<li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>-->
                <?php
                //je vais chercher la config (si je ne l'ai pas déjà fait)
                include_once "config.php";
                //Faire une connexion à BDD
                $pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD
                                        , Config::UTILISATEUR, Config::MOTDEPASSE);
                //préparer la requete
                $requete = $pdo->prepare("select * from categories");
                //executer la requete
                $requete->execute();
                //récupérer le résultat
                $lignes = $requete->fetchAll();

                //var_dump($lignes);

                //pour débuguer je regarde ce qu'il y a dedans
                //var_dump($dossiers);
                foreach ($lignes as $d) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dossier.php?d=<?php echo $d["id"] ?>"><?php echo $d["titre"] ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>