<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from secteur");

$requete->execute();

$lignes = $requete->fetchAll();

$title = "Nouvel évenement";

include "header.php";
?>

    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">
        <h1 class="p-3">Créer un nouvel evenement !</h1>
        <form method="post" action="actions/recupEvent.php">
            <h2>Titre</h2>
            <input type="text" required maxlength="50" name="titre" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Description</h2>
            <textarea name="description" id="description" maxlength="2000" rows="5" style="resize: none;" class="w-50 mb-3" required></textarea>
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Image (URL)</h2>
            <input type="text" required name="image" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Couleur du fond</h2>
            <input type="color" required name="couleur" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Couleur du texte</h2>
            <input type="color" required name="couleurTexte" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Couleur des boutons</h2>
            <input type="color" required name="couleurBouton" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2 class="mt-3">Choisissez les secteurs visés</h2>

            <select multiple name="cadre[]" id="cadre" required class="w-50 mb-3" size="15">
                <option disabled selected value="choisissez">choisissez</option>
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