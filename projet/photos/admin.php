<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

$title = "Formulaire";
include "header.php";
?>

    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">
        <h1 class="p-3">Bienvenue dans notre évenement !</h1>
        <form method="post" action="actions/recoieDonné.php">
            <h2>Votre prenom</h2>
            <input type="text" required name="prenom" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Votre nom</h2>
            <input type="text" required name="nom" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Votre mail</h2>
            <input type="email" required name="mail" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2 class="mt-3">Quel est votre civilité</h2>

            <select name="civilite" id="civilite-select" required class="w-50 mb-3">
                <option disabled selected value="">choisissez</option>
                <option value="un">femme</option>
                <option value="deux">homme</option>
                <option value="trois">non binaire</option>
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
                <input type="hidden" name="token" value="<?php echo $token ?>">
                <a href="ajout_evenement.php" class="btn btn-success ">Ajouter</a>
            </select>

            <h2>Votre telephone</h2>
            <input type="phone" maxlength="10" required name="phone" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">


            <h2>Votre telephone fixe</h2>
            <input type="phone" maxlength="10" required name="fixe" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2 class="mt-3">Choisissez le nombre de personnes présente</h2>

            <select name="personnes" id="personnes" required class="w-50 mb-3">
                <option disabled selected value="">choisissez</option>
                <option value="un">1</option>
                <option value="deux">2</option>
                <option value="trois">3</option>
                <option value="quatre">4</option>
                <option value="cinq">5</option>
                <option value="six">5+</option>
                <input type="hidden" name="token" value="<?php echo $token ?>">
            </select>

            <h2>nom de votre entreprise</h2>
            <input type="text" required name="entreprise" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <div>
                <input type="checkbox" id="newletter" name="newletter">
                <label for="newletter">Voulez vous recevoir notre newletter</label>
            </div>

            <div>
                <input type="checkbox" id="donnees" name="donnees" required>
                <label for="donnees">Acceptez vous qu'on accède aux données remplis dans ce formulaire</label>
            </div>

            </select>
            <input type="submit" value="envoyer" class="mt-5 btn-primary btn">
            <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>

    </div>

<?php
include "footer.php";