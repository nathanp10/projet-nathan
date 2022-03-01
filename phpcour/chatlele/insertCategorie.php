<?php
$title = filter_input(INPUT_POST, "titre");
$description = filter_input(INPUT_POST, "description");

//insertion dans la BDD
//je vais chercher la config(si se n'est pas deja fait)
include_once "../config.php";
//Faire une connexion a la BDD
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
$requete = $pdo->prepare("insert into categories(titre,description)values(:titre, :description)");
//ne jamais faire des requette par concatenation en mysql
$requete->bindParam(":titre", $title);
$requete->bindParam(":description", $description);


$requete->execute();
header("location: ../index.php");
