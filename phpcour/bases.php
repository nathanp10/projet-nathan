<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bases du php</title>
</head>
<body>
<h1>Bases du PHP</h1>
<p>Relisez le code pour réviser</p>
<?php
//commentaire sur une ligne
/*
* Sur plusieur
*ligne
*C'est comme ça
*/
//VARIABLES
$maVariable = 8; //toujour avec un $ devant
$maVariable = "toto"; //les variables ne sont pas typées
echo $maVariable;
echo "<hr>";

//conditions
if ($maVariable == "Titi") {
    echo "C'est pas Titi";
} else {
    echo "C'est pas Titi";
}
echo "<hr>";
//BOUClES
for ($i = 0; $i < 10; $i++) {
    echo "YOOOOOOOOOOOO <br>";
}
$puissancede2 = 2;
while ($puissancede2 < 500) {
    echo $puissancede2 . "<br>"; //le . sert à la concaténation
    $puissancede2 *= 2; //version rapide de $puissancede2=$puissancede2*2
}
echo "<hr>";
//petit point concaténation
// En php on peut déclarer des chaine de caracteres avec des " ou des '
$s = "Toto";
$t = 'Titi';
//Par contre pour la concaténation :
echo 'Si ma chaine est délimiter avec des simple cote \' :je fais OBLIGATOIREMENT'
    . ' de la concaténation avec des .';
echo '<br> Par exemple : le contenu de la variable est ' . $s;

echo "<br> alors qu'avec des \" je peux mettre une variable dedans.";
echo "<br> Par exemple : le contenu de la variable est $s";
echo "<hr>";
//Affichez tous les entier de 1 à 100, par ligne de 10
/*
 * 1 2 3 4 5 6 7 8 9 10
 * 11 12 13 14 15 16 17 18 19 20
 * ....
 */
/*
 * <table>
 * <tr><td>1</td><td>2</td></tr>
 * <tr><td>2</td><td>4</td></tr>
 * </table>
 */
echo "<table>";
for ($i = 1; $i < 101; $i++){
    if($i%10==1){
        echo "<tr>";
    }

    echo "<td>".$i."</td>";

    if ($i%10==0) {
        echo "</tr>";
    }
}
echo "</table>";
//Afficher tout les nombres triangulaire de 1 à 100
$nombre = 1;
$ajout = 2;
while ($nombre < 100) {
    echo "$nombre";
    $nombre += $ajout;
    $ajout++;
}
?>
</body>
</html>