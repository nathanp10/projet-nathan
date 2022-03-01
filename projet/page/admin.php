<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

$title = "admin";
include "header.php";
?>

    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">
        <h1 class="p-3">Bienvenue dans l'espace évènement</h1>
        <form method="post" action="actions/recoieDonné.php">
            <h2>Quel est le titre</h2>
            <input type="text" required name="titre" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Description</h2>
            <input type="text" required name="description" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2>Quel domaine veux tu pour cet évènement</h2>
            <input type="text" required name="domaine" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">

            <h2 class="mt-3">Quel est votre civilité</h2>

            <select name="couleur" id="couleur-select" required class="w-50 mb-3">
                <option disabled selected value="">choisissez</option>
                <option value="rouge">rouge</option>
                <option value="bleu">bleu</option>
                <option value="noir">noir</option>
                <option value="violet">violet</option>
                <option value="jaune">jaune</option>
                <option value="blanc">blanc</option>
                <option value="vert">vert</option>
                <option value="rose">rose</option>
                <option value="gris">gris</option>
                <input type="hidden" name="token" value="<?php echo $token ?>">
            </select>
            <h2>Quel bannière voulez vous :</h2>
            <form action="actions/ajouterChaton.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fichier" >

            </select>
            <input type="submit" value="envoyer" class="mt-5 btn-primary btn">
            <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>

    </div>

<?php
include "footer.php";
