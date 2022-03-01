<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

$name = "test";
$title = "Nos évenements";
include "header.php";


include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from evenement");

$requete->execute();

$lignes = $requete->fetchAll();


?>
<section>

    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">
        <h1 class="p-5">Voici la liste de nos évenements !</h1>
        <h2 class="p-5 mx">Rencontrez des professionnels dès maintenant dans l'évenement de votre choix</h2>
    </div>

    <br>

    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">

        <table class="table table-striped">
            <tr>
                <th>Nom</th>
                <th>Plus d'informations</th>
                <?php if ($admin == 1) { ?>
                <th>Modifier</th>
                <th>Supprimer</th>
                <?php } ?>
            </tr>

            <?php
            foreach ($lignes as $l) {
                ?>
                <tr>
                    <td><?php echo $l["titre"]; ?></td>
                    <td><a class="btn btn-primary" href="formulaire.php?id=<?php echo $l["id"]?>">Voir l'évenement</a></td>
                    <?php if ($admin == 1) { ?>
                    <td><a class="btn btn-warning" href="modifierEvenement.php?id=<?php echo $l["id"]?>">Modifier</a></td>
                    <td><a class="btn btn-danger" href="actions/deleteEvent.php?id=<?php echo $l["id"]?>">Supprimer</a></td>
                    <?php  } ?>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</section>

<hr>

<?php
include "footer.php";
?>
