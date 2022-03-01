<?php
//récupération des valeurs
$titre=filter_input(INPUT_POST, "titre");
$description=filter_input(INPUT_POST, "description");

//insertion dans la BDD
//je vais chercher la config (si je ne l'ai pas déjà fait)
include_once "../config.php";
//Faire une connexion à BDD
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD
    , Config::UTILISATEUR, Config::MOTDEPASSE);
//préparer la requete
$requete = $pdo->prepare("insert into categories(titre,description) values (:titre, :description)");
$requete->bindParam(":titre", $titre);
$requete->bindParam(":description", $description);

$requete->execute();

header("location: ../index.php");
