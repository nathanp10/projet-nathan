<?php
session_start();

//vérifier le token
$token=filter_input(INPUT_POST, "token");

if($token!=$_SESSION["token"]){
    die("Meurs vilain pirate");
}

$nomDuDossier=filter_input(INPUT_POST, "nomDuDossier");

mkdir("../Photos/$nomDuDossier");

header("location: ../dossier.php?d=$nomDuDossier");