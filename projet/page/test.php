<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Envoi de données en GET</title>
</head>
<body>
<h1>Envoi de données en GET</h1>
<h2>Avec un fomulaire</h2>
<form method="get" action="02-ReceptionDeDonneesEnGET.php">
    Un nombre : <input type="number"
                       min="0"
                       max="1000"
                       step="1"
                       name="unNombre">
    <br>
    Une chaine de caractères : <input type="text"
                                      maxlength="100"
                                      name="uneChaine">
    <br>
    <input type="submit" value="OK">
</form>

<h2>Avec des liens</h2>
<?php
for ($i=0;$i<10;$i++){
    echo "<a href='02-ReceptionDeDonneesEnGET.php?unNombre=$i&uneChaine=a$i'>lien $i</a><br>";
}
?>
</body>
</html>
