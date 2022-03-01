<?php
//Je répupère le nom du dossier cible
$d=filter_input(INPUT_POST, "dossier");
//Je récupère le fichier envoyé
//avec $_FILES (pas $_GET ni $_POST ni filter_input)
$fichier=$_FILES["fichier"];
//Son nom original :
$nomOriginal=basename($fichier["name"]);
//Son nom temporraire (tel qu'il est sur le serveur pour le moment
$emplacementTemporraire=$fichier["tmp_name"];

//Je bouge le fichier vers la bonne destination
 move_uploaded_file($emplacementTemporraire, "../Photos/$d/$nomOriginal");

 //Et je retourne àn la visualisation du dossier
header("location: ../dossier.php?d=$d");

?>