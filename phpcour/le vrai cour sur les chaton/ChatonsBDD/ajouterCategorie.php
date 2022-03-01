<?php
$title="Ajouter une catégorie";
include "header.php";
//TODO il faudrait gérer un token de sécurité, mais on n'a pas le temps
?>
<div class="container">
    <h1>Ajouter une catégorie</h1>
    <form action="actions/insertCategorie.php" method="post">
        <div class="form-group">
            <label for="titre">Titre</label>
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