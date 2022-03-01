<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

$id = filter_input(INPUT_GET,"id");

include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from secteur");

$requete->execute();

$lignes = $requete->fetchAll();

include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete2 = $pdo->prepare("select * from evenement where id=:id");
$requete2->bindParam(":id",$id);

$requete2->execute();

$event = $requete2->fetch();

$titre = $event[1];
$image = $event[2];
$description = $event[3];

$color = $event[4];
$colorTexte= $event[5];
$colorBouton= $event[6];

$title = "Modifier évenement";
include "header.php";
?>

    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">
        <h1 class="p-3">Modifier l'évenement : <?php echo $titre ?>!</h1>
        <form method="post" action="actions/updateEvent.php?id=<?php echo $id ?>">
            <h2>Titre</h2>
            <input type="text" required maxlength="50" name="titre" class="w-50 mb-3" value="<?php echo $titre?>">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Description</h2>
            <textarea name="description" id="description" maxlength="2000" rows="5" style="resize: none;" class="w-50 mb-3" required><?php echo $description?></textarea>
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Image (URL)</h2>
            <input type="text" required name="image" class="w-50 mb-3" value="<?php echo $image?>">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Couleur du fond</h2>
            <input type="color" required name="couleur" class="w-50 mb-3" value="<?php echo $color?>">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Couleur du texte</h2>
            <input type="color" required name="couleurTexte" class="w-50 mb-3" value="<?php echo $colorTexte?>">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Couleur des boutons</h2>
            <input type="color" required name="couleurBouton" class="w-50 mb-3" value="<?php echo $colorBouton ?>">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2 class="mt-3">Choisissez les secteurs visés</h2>

            <select multiple name="cadre[]" id="cadre" required class="w-50 mb-3" size="15">
                <option disabled selected value="">choisissez</option>
                <?php
                foreach ($lignes as $l) {
                    ?>
                    <option value="<?php echo $l["nom"]?>" ><?php echo $l["nom"] ?></option>
                    <?php
                }
                ?>

                <input type="hidden" name="token" value="<?php echo $token ?>">
            </select>

            <br>

            <a target="_blank" class="mt-5 btn-primary btn" href="secteurs.php">Ajouter un secteur </a>
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <br>

            <input type="submit" value="envoyer" class="mt-5 btn-primary btn">
            <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>

    </div>

<?php
include "footer.php";