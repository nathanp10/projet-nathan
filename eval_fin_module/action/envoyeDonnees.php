<?php

$dates=filter_input(INPUT_POST, "dates");
$lieux=filter_input(INPUT_POST, "lieux");
$relever=filter_input(INPUT_POST, "relever");

include_once "../config.php";
//liaison base de donnée
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD
    , Config::UTILISATEUR, Config::MOTDEPASSE);
//préparation de la requête
$requete=$pdo->prepare("insert into eval (dates ,lieux, relever) values (:dates,:lieux,:relever)");
$requete->bindParam(":dates", $dates);
$requete->bindParam(":lieux", $lieux);
$requete->bindParam(":relever", $relever);

$requete->execute();

header("location: ../index.php");
?>








