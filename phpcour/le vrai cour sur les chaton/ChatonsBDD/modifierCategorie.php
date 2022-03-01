<?php
$title="Modifier une catégorie";
include "header.php";
//TODO il faudrait gérer un token de sécurité, mais on n'a pas le temps

//Récupérer l'id dans l'URL
$id=filter_input(INPUT_GET, "id");

//je vais chercher la config (si je ne l'ai pas déjà fait)
include_once "config.php";
//Faire une connexion à BDD
$pdo = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BDD
    , Config::UTILISATEUR, Config::MOTDEPASSE);
//préparer la requete
$requete=$pdo->prepare("select * from categories where id=:id");
$requete->bindParam(":id", $id);
$requete->execute();
$lignes=$requete->fetchAll();
$categorie=$lignes[0]; //normalement je n'ai récupéré qu'une ligne

?>
<div class="container">
    <h1>Modifier une catégorie</h1>
    <form action="actions/updateCategorie.php" method="post">
        <input type="hidden" value="<?php echo $categorie["id"] ?>" name="id">
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" value="<?php echo $categorie["titre"] ?>" name="titre" required class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description"><?php echo $categorie["description"] ?></textarea>
        </div>
        <input type="submit" value="OK" class="btn btn-success">
    </form>
</div>

<?php
include "footer.php";