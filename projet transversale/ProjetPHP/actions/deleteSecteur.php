<?php

$id = filter_input(INPUT_GET,"id");


include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete=$pdo->prepare("DELETE from secteur where id = (:id)");
$requete->bindParam(":id",$id);

$requete->execute();

header("location:../secteurs.php");