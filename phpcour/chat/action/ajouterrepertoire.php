<?php
session_start();
//vérifire le token
$token=filter_input(INPUT_POST,"token");
if ($token!=$_SESSION["token"]){
    die("Meurs");
}
)
$nomDuDossier=filter_input(INPUT_POST, "nomDuDossier");
mkdir("../Photos/$nomDuDossier");
header("location: ../dossier.php?d=$nomDuDossier");
