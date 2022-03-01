<?php
$title = filter_input(INPUT_POST, "titre");
$description = filter_input(INPUT_POST, "description");
$id=filter_input(INPUT_POST,"id");

//insertion dans la BDD
//je vais chercher la config(si se n'est pas deja fait)
include_once "../config.php";
//Faire une connexion a la BDD
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
$requete = $pdo->prepare("update categorie set titre=:titre,description=:description where id=:id");
//ne jamais faire des requette par concatenation en mysql
$requete->bindParam(":titre", $title);
$requete->bindParam(":description", $description);
$requete->bindParam(":id", $id);

$requete->execute();
header("location: ../index.php");
