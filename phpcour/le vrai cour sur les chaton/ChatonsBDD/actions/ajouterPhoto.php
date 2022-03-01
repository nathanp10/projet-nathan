<?php
//Je récupère le nom du dossier cible
$d=filter_input(INPUT_POST, "dossier");
//Je récupère le fichier envoyé
//avec $_FILES (pas $_GET ni $_POST ni filter_input)
$fichier=$_FILES["fichier"];
//Son nom original :
$nomOriginal=basename($fichier["name"]);
//Son emplacement temporaire (là où il est sur le serveur pour le moment)
$emplacementTemporaire=$fichier["tmp_name"];

//Je bouge le fichier vers la bonne destination
move_uploaded_file($emplacementTemporaire, "../Photos/$d/$nomOriginal");

//Et je retourne à la visualisation du dossier
header("location: ../dossier.php?d=$d");

