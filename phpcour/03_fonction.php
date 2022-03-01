<?php
function AfficherCoucou(){
    echo "Coucou<br>";
    }
function AfficherCoucouPrenom($prenom){
    echo "Coucou $prenom<br>";
}
function estdivisiblepar3($nombre){
    return$nombre%3==0;
}
function estPremier($nombre){
    for ($i=2;$i<$nombre;$i++){
        if ($nombre%$i==0){
            return false;
        }
    }
    return true;
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Les fonctions</h1>
<?php
for($i=0;$i<10;$i++) {
    AfficherCoucou();
}
    AfficherCoucouPrenom('Alan');
    for($i=0;$i<10;$i++){
        if (estdivisiblepar3($i))
            echo "$i est divisible par 3<br>";
        else
            echo "$i n'est pas divisible par 3<br>";
    }
    for ($i=0;$i<1000;$i++){
        if(estPremier($i)){
            echo $i." ";
        }
    }
?>
</body>
</html>