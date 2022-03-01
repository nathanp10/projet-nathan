<?php
//récupération des valeurs
$titre=filter_input(INPUT_POST, "titre");
$description=filter_input(INPUT_POST, "description");
$id=filter_input(INPUT_POST, "id");

//insertion dans la BDD
//je vais chercher la config (si je ne l'ai pas déjà fait)
include_once "../config.php";
//Faire une connexion à BDD
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD
    , Config::UTILISATEUR, Config::MOTDEPASSE);
//préparer la requete
$requete = $pdo->prepare("update categories set titre=:titre, description=:description where id=:id");
$requete->bindParam(":titre", $titre);
$requete->bindParam(":description", $description);
$requete->bindParam(":id", $id);

$requete->execute();

header("location: ../index.php");
