<?php

$nom = filter_input(INPUT_POST,"nom");


include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete=$pdo->prepare("insert into secteur (nom) values (:nom)");
$requete->bindParam(":nom",$nom);

$requete->execute();

header("location:../secteurs.php");