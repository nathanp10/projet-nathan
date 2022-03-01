<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

$id = filter_input(INPUT_GET,"id");

include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from evenement where id = :id");
$requete->bindParam(":id", $id);
$requete->execute();
$lignes = $requete->fetch();

$name = $lignes[1];
$image = $lignes[2];
$description = $lignes[3];

$color = $lignes[4];
$colorTexte= $lignes[5];
$colorBouton= $lignes[6];
$lignes[7] = substr($lignes[7], 0,-1);
$cadre = explode(";", $lignes[7]);




$title = "Formulaire évenement $name";

include "header.php";


?>

    <div style="background-color: <?php echo $color ?>; color: <?php echo $colorTexte ?>" class="container mt-5 p-2 text-center">
        <h1> Bienvenue dans notre évenement <?php echo $name ?></h1>
        <br>
        <h2><?php echo $description ?></h2>

    </div>
<div class="container p-2 text-center" style="background-color: <?php echo $color ?>">
    <img src="<?php echo $image ?>" alt="image" width="100%" height="auto">
</div>


    <div style="background-color: <?php echo $color ?>; color: <?php echo $colorTexte ?>" class="container p-3 text-center mb-5" >

        <form method="post" action="actions/recupForm.php?id=<?php echo $id?>">
            <h2>Votre prénom</h2>
            <input type="text" required name="prenom" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Votre nom</h2>
            <input type="text" required name="nom" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Votre mail</h2>
            <input type="email" required name="mail" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2 class="mt-3">Quel est votre civilité</h2>

            <select name="civiliter" id="civilite-select" required class="w-50 mb-3">
                <option disabled selected value="">choisissez</option>
                <option value="femme">femme</option>
                <option value="homme">homme</option>
                <option value="non binaire">non binaire</option>
                <input type="hidden" name="token" value="<?php echo $token ?>">
            </select>
            <br>

            <h2 class="mt-3">Choisissez votre cadre</h2>

            <select name="cadre" id="cadre" required class="w-50 mb-3">
                <option disabled selected value="">choisissez</option>
                <option value="pro">professionnel</option>
                <option value="particulier">particulier</option>
                <input type="hidden" name="token" value="<?php echo $token ?>">
            </select>
            <h2 class="mt-3">Choisissez votre domaine d'activité</h2>

            <select name="domaine" id="domaine" required class="w-50 mb-3">
                <option disabled selected value="">choisissez</option>

                <?php
                foreach ($cadre as $c) {
                    ?>
                    <option value="<?php echo $c?>" ><?php echo $c ?></option>
                    <?php
                }
                ?>


                <input type="hidden" name="token" value="<?php echo $token ?>">
            </select>

            <h2>Votre téléphone</h2>
            <input type="phone" maxlength="10" name="telephone" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">


            <h2>Votre téléphone fixe</h2>
            <input type="phone" maxlength="10" name="fixe" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2 class="mt-3">Choisissez le nombre de personne(s) présente(s)</h2>

            <select name="personnes" id="personnes" class="w-50 mb-3">
                <option disabled selected value="">choisissez</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="5+">5+</option>
                <input type="hidden" name="token" value="<?php echo $token ?>">
            </select>

            <h2>nom de votre entreprise</h2>
            <input type="text" name="entreprise" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <div>
                <input type="checkbox" id="newletter" value="1" name="newletter">
                <label for="newletter">Voulez-vous recevoir notre newletter</label>
            </div>
            <br>
            <div>
                <input type="checkbox" id="donnees" name="donnees" required>
                <label for="donnees">Acceptez l'utilisation de vos données</label>
            </div>

            <br>

            <h2>Partagez le lien de ce formulaire !</h2>
            <input type="text" readonly disabled value="http://localhost/ProjetPHP/formulaire.php?id=<?php echo $id ?>" class="w-50 mb-3" style="background-color: <?php echo $color ?>; color: <?php echo $colorTexte ?>">
            <br>

            </select>
            <input type="submit" value="envoyer" style="background-color: <?php echo $colorBouton ?>; color: <?php echo $colorTexte ?>" class="mt-5 btn border" >
            <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>

    </div>

<?php
include "footer.php";