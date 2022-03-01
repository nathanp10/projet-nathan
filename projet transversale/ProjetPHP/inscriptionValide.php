<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

$title = "Accueil Raminagrobis";
include "header.php";
?>
    <br>
    <br>
    <br>
    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">
        <h1 class="p-5">Votre inscription à bien été enregistrée !</h1>
        <h2 class="p-5 mx">Toute l'équipe de Raminagrobis vous remercie et vous souhaite de passer un bon évenement !</h2>

        <br>

        <a href="index.php" class="btn btn-primary">Retour à l'accueil</a>

    </div>

    <br>
    <br>
    <br>


<?php
include "footer.php";