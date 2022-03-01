<?php
//pour pouvoir utiliser les sessions
session_start();
//token anti forgery (anti faille)
$token = uniqid();
//je le stock en session
$_SESSION["token"] = $token;

$title = "Les chaton ";
include "header.php";
?>
<div class="container">
    <h1>Liste des catégories</h1>
    <?php
    //je vais chercher la config(si se n'est pas deja fait)
    include_once "config.php";
    //Faire une connexion a la BDD
    $pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
    //préparer la requette
    $requette = $pdo->prepare("select * from categorie");
    //execute la requette
    $requette->execute();
    //récuperé le résultat

    $lignes = $requette->fetchAll();
    ?>
    <table class="table table-striped">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th></th>
        </tr>
        <?php
        foreach ($lignes as $l) {
            ?>
            <tr>
                <td><?php echo $l["titre"] ?></td>
                <td><?php echo $l["description"] ?></td>
                <td><a href="modifierCategorie.php" class="btn btn-warning">Modifier</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <a href="ajouterCategorie.php?id=<?php echo $l["btn btn-sm btn-success">Ajouter</a>
</div>

<?php
include "footer.php";
?>
