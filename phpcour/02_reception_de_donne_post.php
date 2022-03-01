<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reception de donné</title>
</head>
<body>
<h1>Recuperation de donne</h1>
<?php
//recuperation de données recue en GET
//ancienne méthode
$unNombre=filter_input(INPUT_POST, "unNombre");
$unNombre=filter_input(INPUT_POST, "uneChaine");
echo "Le nombre récupéré est $unNombre";
echo"<br>";
echo "Le nombre récupéré est ".htmlspecialchars($uneChaine);
?>
</body>
</html>
