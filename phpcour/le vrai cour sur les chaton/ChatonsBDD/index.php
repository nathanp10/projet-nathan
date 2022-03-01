<?php
//pour pouvoir utiliser les sessions
session_start();
//token anti forgery (ou anti faille CSRF)
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

$title = "Gestion des chatons";
include "header.php";
?>
    <div class="container">
        <h1>Liste des catégories</h1>
        <?php
        //je vais chercher la config (si je ne l'ai pas déjà fait)
        include_once "config.php";
        //Faire une connexion à BDD
        $pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD
            , Config::UTILISATEUR, Config::MOTDEPASSE);
        //préparer la requete
        $requete = $pdo->prepare("select * from categories");
        //executer la requete
        $requete->execute();
        //récupérer le résultat
        $lignes = $requete->fetchAll();
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
                    <td>
                        <a href="modifierCategorie.php?id=<?php echo $l["id"] ?>"
                           class="btn btn-sm btn-warning">Modifier</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <a href="ajouterCategorie.php" class="btn btn-success">Ajouter</a>
    </div>
<?php
include "footer.php";
