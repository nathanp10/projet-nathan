<?php
$title = "Les chaton ";
include "header.php";
$d = filter_input(INPUT_GET, "d");

?>
    <div class="container">

        <h1>Visualisation des chatons du dossier <i><?php echo htmlspecialchars($d) ?></i></h1>
        <div class="row">
            <?php
            //Je vais chercher les photos dans le dossier.
            $image = scandir("Photos/$d");
            foreach ($image as $img) {
                if ($img != "." && $img != "..") {
                    //echo "<img src='Photos/$d/$img'>";
                    ?>
                    <div class="col col-3">
                        <div class="card"><img src="<?php echo "Photos/$d/$img"?> "alt="" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $img?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }

            ?>
        </div>
        <h2>Voulez vous ajoutez des chats</h2>
        <form method="post" enctype="multipart/form-data" action="action/ajouterPhotos.php">
            Ajouter une photo
            <input type="file" name="fichier">
            <input type="submit" value="OK">
            <input type="hidden" name="dossier" value="<?php echo $d ?>">
        </form>
    </div>
<?php
include "footer.php";
?>