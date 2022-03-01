<?php
//pour pouvoir utiliser les sessions
session_start();
//token anti forgery (ou anti faille CSRF)
$token=uniqid();
//je le stocke en session
$_SESSION["token"]=$token;

$title = "Gestion des chatons";
include "header.php";
?>
    <div class="container">
        <form method="post" action="actions/ajouterDossier.php">
            <h2>Ajouter un dossier</h2>
            <input type="text" required name="nomDuDossier">
            <input type="submit" value="OK">
            <input type="hidden" name="token" value="<?php echo $token?>">
        </form>

        <form method="post" action="actions/supprimerDossier.php">
            <h2>Supprimer un dossier</h2>
            <select name="nomDuDossier">
                <?php
                $dossiers=scandir("Photos");
                //pour débuguer je regarde ce qu'il y a dedans
                //var_dump($dossiers);
                foreach ($dossiers as $d){
                    if ($d!="." && $d!=".."){
                        ?>
                        <option value="<?php echo $d ?>"><?php echo $d ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <input type="submit" value="OK">
            <input type="hidden" name="token" value="<?php echo $token?>">
        </form>

    </div>
<?php
include "footer.php";
