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

$title = "Secteurs";
include "header.php";
?>

    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">
        <h1 class="p-3">Voici tous les secteurs que nos évenements regroupes !</h1>

        <table class="table table-striped">
            <tr>
                <th>Nom</th>
                <?php if ($admin == 1) { ?>
                <th>Retirer</th>
                <?php } ?>
            </tr>

            <?php
            foreach ($lignes as $l) {
                ?>
                <tr>
                    <td><?php echo $l["nom"]; ?></td>
                    <?php if ($admin == 1) { ?>
                    <td><a href="actions/deleteSecteur.php?id=<?php echo $l["id"] ?>" class="btn btn-danger">Supprimer</a></td>
                    <?php } ?>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>

    <div class="container mt-5 shadow bg-light p-3 text-center mb-5">
        <h1 class="p-3">Si votre secteur d'activité n'apparait pas dans la liste, vous pouvez l'ajouter ici : </h1>
        <form method="post" action="actions/recupSecteur.php">
            <h2>Nom</h2>

            <input type="text" required maxlength="50" name="nom" class="w-50 mb-3">
            <input type="hidden" name="token" value="<?php echo $token ?>">


            <br>

            <input type="submit" value="envoyer" class="mt-5 btn-primary btn">
            <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>

    </div>

<?php
include "footer.php";