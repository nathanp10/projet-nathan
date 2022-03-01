<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau</title>
</head>
<body>
<h1>Tableau J'ai pas reussi mais j'ai laisser quelques tentatives</h1>
<?php

$l=filter_input(INPUT_POST, "relever");
echo "La chaine récupérée est $l<br>";
$l="123456789";
?>

<?php

?>
<tr>
    <td><?php echo $l[0]?></td>
    <td><?php echo $l[1]?></td>
    <td><?php echo $l[2]?></td>
</tr>
<br>
<tr>
    <td><?php echo $l[3]?></td>
    <td><?php echo $l[4]?></td>
    <td><?php echo $l[5]?></td>
</tr>
<br>
<tr>
    <td><?php echo $l[6]?></td>
    <td><?php echo $l[7]?></td>
    <td><?php echo $l[8]?></td>
</tr>

<h1>Récupération des infos envoyées en POST</h1>
<?php
//$_GET on l'utilise rarement
/*$nombre=$_POST["nombre"];
$chaine=$_POST["chaine"];*/
//il vaut mieux filtrer
$relever=filter_input(INPUT_POST, "relever");



echo "Le nombre récupéré est $relever<br>";

?>
</body>
</html>



