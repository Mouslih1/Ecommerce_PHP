<?php

$title = "Ajouter categories";

?>

<div class="mt-3 mb-3">
    <h2>Ajouter categories</h2>
</div>

<?php if (isset($error)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hey !</strong>
        <?php
        echo $error;
        unset($error);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<form action="index.php?controller=categorieController&action=ajouterCategorieAction" method="POST">
    <div class="mb-3">
        <label class="form-label">Libelle </label>
        <input type="text" class="form-control" name="libelle" placeholder="Libelle">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="description" rows="6" cols="40" class="form-control" placeholder="Content ..."></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Icon </label>
        <input type="text" class="form-control" name="icon" placeholder="Icon">
    </div>
    <div class="mb-3">
        <input type="submit" class="form-control btn btn-primary" name="ajouter" value="Ajouter categorie">
    </div>
</form>

