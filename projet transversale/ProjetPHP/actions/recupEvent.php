<?php

$titre = filter_input(INPUT_POST,"titre");
$description = filter_input(INPUT_POST,"description");
$image = filter_input(INPUT_POST,"image");
$couleur = filter_input(INPUT_POST,"couleur");
$couleurTexte = filter_input(INPUT_POST,"couleurTexte");
$couleurBouton = filter_input(INPUT_POST,"couleurBouton");
$c = $_POST['cadre'];
$cadre = "";
foreach($c as $l) {
    $cadre = $cadre.$l.";";
}

include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete=$pdo->prepare("insert into evenement (titre,description,couleur,cadre,couleurTexte,couleurBouton,image) values (:titre,:description,:couleur,:cadre,:couleurTexte,:couleurBouton,:image)");
$requete->bindParam(":titre",$titre);
$requete->bindParam(":description",$description);
$requete->bindParam(":image",$image);
$requete->bindParam(":couleur",$couleur);
$requete->bindParam(":couleurTexte",$couleurTexte);
$requete->bindParam(":couleurBouton",$couleurBouton);
$requete->bindParam(":cadre",$cadre);

$requete->execute();

header("location:../evenements.php");