<?php

$titre = filter_input(INPUT_POST,"titre");
$description = filter_input(INPUT_POST,"description");
$image = filter_input(INPUT_POST,"image");
$couleur = filter_input(INPUT_POST,"couleur");
$couleurTexte = filter_input(INPUT_POST,"couleurTexte");
$couleurBouton = filter_input(INPUT_POST,"couleurBouton");
$id = filter_input(INPUT_GET,"id");
$c = $_POST['cadre'];
$cadre = "";
foreach($c as $l) {
    $cadre = $cadre.$l.";";
}

include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete=$pdo->prepare("update evenement set titre=:titre,description=:description,couleur=:couleur,cadre=:cadre,couleurTexte=:couleurTexte,couleurBouton=:couleurBouton,image=:image where id= :id");
$requete->bindParam(":titre",$titre);
$requete->bindParam(":description",$description);
$requete->bindParam(":image",$image);
$requete->bindParam(":couleur",$couleur);
$requete->bindParam(":couleurTexte",$couleurTexte);
$requete->bindParam(":couleurBouton",$couleurBouton);
$requete->bindParam(":cadre",$cadre);
$requete->bindParam(":id",$id);

$requete->execute();

header("location:../evenements.php");