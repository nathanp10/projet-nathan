<?php
$title = "Ajouter une catégorie";
include "header.php";
//TODO il faudrai gerer un token de securite , mais on n'a pas le temps

//Récuperer l'id dans l'URL
$id=filter_input(INPUT_GET,"id");

//je vais chercher la config(si se n'est pas deja fait)
include_once "config.php";
//Faire une connexion a la BDD
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MOTDEPASSE);
//préparer la requette
$requete=$pdo->prepare("select * from categories where id=:id");
$requete->bindParam("id",$id);
$requete->execute();
$ligne=$requete->fetchAll();
$categorie=$ligne[0]; //normalement je n'ai pas récupéré
?>
    <div class="container">
        <h1>Modifier une catégorie</h1>
        <form action="updateCategorie.php" method="post">
            <input type="hidden" value="<?php echo $categorie["id"]?>"name="id">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" name="titre" required class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description"><?php echo $categorie["description"]?></textarea>
            </div>
            <input type="submit" value="OK" class="btn btn-success">
        </form>
    </div>

<?php
include "footer.php";
?>