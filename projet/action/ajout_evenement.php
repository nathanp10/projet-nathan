<?php
$title="Ajouter une domaine";
include "header.php";
//TODO il faudrait gérer un token de sécurité, mais on n'a pas le temps
?>
    <div class="container">
        <h1>Ajouter un domaine</h1>
        <form action="actions/insertDomaine.php" method="post">
            <div class="form-group">
                <label for="Nom">Nom</label>
                <input type="text" name="titre" required class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <input type="submit" value="OK" class="btn btn-success">
        </form>
    </div>

<?php
include "footer.php";
