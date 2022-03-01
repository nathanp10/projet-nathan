<?php
session_start();
$token = uniqid();
//je le stocke en session
$_SESSION["token"] = $token;

include_once "config.php";
$pdo = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BDD, Config::UTILISATEUR, Config::MDP);

$requete = $pdo->prepare("select * from inscription");

$requete->execute();

$lignes = $requete->fetchAll();

$requete2 = $pdo->prepare("select * from evenement");

$requete2->execute();

$event = $requete2->fetchAll();

$title = "Secteurs";
include "header.php";
?>

    <div class=" mt-5 p-5 text-center">
        <h1 class="p-3">Voici toutes les inscriptions effectuées pour les prochains évenements!</h1>

        <?php
        foreach ($event as $e) {
            ?>
            <div class="bg-light p-3 rounded shadow">
                <h2> Ils sont inscris à l'évenement : <?php echo $e["titre"] ?></h2>
                <table class="table table-striped bg_light mt-3 " style="font-size: 13px;">

                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>civilité</th>
                        <th>mail</th>
                        <th>Téléphone</th>
                        <th>Fixe</th>
                        <th>Date d'inscription</th>
                        <th>Cadre</th>
                        <th>Entreprise</th>
                        <th>Domaine</th>
                        <th>Personnes supplémentaires</th>
                        <th>Abonné Newsletter</th>
                        <th>Désincrire</th>
                    </tr>

                    <?php
                    foreach ($lignes as $l) {
                        if ($e["id"] == $l["id_evenement"]) {
                            ?>
                            <tr>
                                <td><?php echo $l["prenom"]; ?></td>
                                <td><?php echo $l["nom"]; ?></td>
                                <td><?php echo $l["civiliter"]; ?></td>
                                <td><?php echo $l["mail"]; ?></td>
                                <td><?php echo $l["telephone"]; ?></td>
                                <td><?php echo $l["fixe"]; ?></td>
                                <td><?php echo $l["date"]; ?></td>
                                <td><?php echo $l["cadre"]; ?></td>
                                <td><?php echo $l["entreprise"]; ?></td>
                                <td><?php echo $l["domaine"]; ?></td>
                                <td><?php echo $l["personnes"]; ?></td>
                                <td><?php if ($l["newletter"] == 1) {
                                        echo "oui";
                                    } else {
                                        echo "non";
                                    } ?></td>
                                <td><a class="btn btn-danger" href="actions/deleteInscription.php?id=<?php echo $l["id"] ?>">DESINSCRIRE</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>

            <br>
            <br>
            <br>
            <br>

            <?php
        }
        ?>

    </div>


<?php
include "footer.php";