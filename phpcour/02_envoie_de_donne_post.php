<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>envoie de donné</title>
</head>
<body>
<h1>envoie de donné</h1>
<h2>avec un formulaire</h2>
<form method="get" action="02_reception_de_donne_get.php">
    Un nombre : <input type="number"
                       min="0"
                       max="1000"
                       step="1"
                       name="unNombre">
    <br>
    Une chaîne de caractere: <input type="text"
                                    maxlength="100"
                                    name="uneChaine">
    <br>
    <input type="submit" value="OK">

</form>
</body>
</html>
