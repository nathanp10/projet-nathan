<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>advent of code</title>
</head>
<body>
<h1>Jour 1</h1>
<?php


function getResultatNiveau2($texteTab)
{
    //je teste chacune des cases du tableau avec les suivant
    for ($i = 0; $i < count($texteTab) - 2; $i++) {
        for ($j = $i + 1; $j < count($texteTab) - 1; $j++) {
            for ($k = $j + 1; $k < count($texteTab); $k++) {
                //Si la somme est 2020 je retourne le produit des 2 cases
                if ($texteTab[$i] + $texteTab[$j] +$texteTab[$k] == 2020) {
                    return $texteTab[$i] * $texteTab[$j] * $texteTab[$k];//j'ai trouvé, je sors de la boucle
                }
            }
        }
    }
}

$texte = filter_input(INPUT_POST, "textarea");

//je vais decouper ligne par ligne
$texteTab = explode("\r\n", $texte);


echo "Le résultat pour le niveau 2 est " . getResultatNiveau2($texteTab);
?>
</body>
</html>
