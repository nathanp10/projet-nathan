<?php

$prenom = filter_input(INPUT_POST,"prenom");
$nom = filter_input(INPUT_POST,"nom");
$mail = filter_input(INPUT_POST,"mail");
$civiliter = filter_input(INPUT_POST,"civiliter");
$cadre = filter_input(INPUT_POST,"cadre");
$domaine = filter_input(INPUT_POST,"domaine");
$telephone = filter_input(INPUT_POST,"telephone");
$fixe = filter_input(INPUT_POST,"fixe");
$personnes = filter_input(INPUT_POST,"personnes");
$entreprise = filter_input(INPUT_POST,"entreprise");
$newletter = filter_input(INPUT_POST,"newletter");
$id_evenement = filter_input(INPUT_GET,"id");
$date = date("y.m.d");

if ($entreprise == null){
    $entreprise = "Non renseigné";
}

if ($personnes == null){
    $personnes = "Non renseigné";
}

include_once "../config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete=$pdo->prepare("insert into inscription (prenom,nom,mail,civiliter,cadre,telephone,fixe,personnes,entreprise,newletter,id_evenement,domaine,date) values (:prenom,:nom,:mail,:civiliter,:cadre,:telephone,:fixe,:personnes,:entreprise,:newletter,:id_evenement,:domaine,:date)");
$requete->bindParam(":prenom",$prenom);
$requete->bindParam(":nom",$nom);
$requete->bindParam(":mail",$mail);
$requete->bindParam(":civiliter",$civiliter);
$requete->bindParam(":cadre",$cadre);
$requete->bindParam(":telephone",$telephone);
$requete->bindParam(":fixe",$fixe);
$requete->bindParam(":personnes",$personnes);
$requete->bindParam(":entreprise",$entreprise);
$requete->bindParam(":newletter",$newletter);
$requete->bindParam(":id_evenement",$id_evenement);
$requete->bindParam(":domaine",$domaine);
$requete->bindParam(":date",$date);

$requete->execute();

header("location:../inscriptionValide.php");