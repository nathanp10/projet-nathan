<?php
//pour pouvoir utiliser les sessions
session_start();
//token anti forgery (anti faille)
$token=uniqid();
//je le stock en session
$_SESSION["token"]=$token;

$title = "Les chaton ";
include "header.php";
?>
<div class="dossier">

    <form action="action/ajouterrepertoire.php"  method="post">
        <h1>Ajouter un dossier</h1>
        <input type="text" required name="nomDuDossier">
        <input type="submit" value="OK">
        <input type="hidden" name="token" value="<?php echo $token?>">
    </form>

    <h2>Supprimer des dossiers</h2>
    <select name="dossier" id="">
        <input type="submit" value="GO">
    </select>

</div>

<?php
include "footer.php";
?>
