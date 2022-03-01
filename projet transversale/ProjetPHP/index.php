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
        <h1 class="p-5">Bienvenue chez Raminagrobis, votre créateur de rencontre professionnel !</h1>
        <h2 class="p-5 mx">Inscrivez-vous dès maintenant dans un de nos nombreux évenements !</h2>
        <br>
        <div class="container d-flex justify-content-around pb-3">
            <a href="evenements.php" class="btn btn-primary">Voir les évenements disponibles</a>
            <a href="secteurs.php" class="btn btn-primary">Voir les secteurs d'activités</a>
        </div>
    </div>

    <br>
    <br>
    <br>


<?php
include "footer.php";