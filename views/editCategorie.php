<?php

$title = "Modifier categories";

?>

<div class="mt-3 mb-3">
    <h2>Modifier categories</h2>
</div>

<?php if(isset($msg)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hey !</strong>
        <?php
        echo $msg;
        unset($msg);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<form action="index.php?controller=categorieController&action=editCategorieAction" method="POST">
<div class="mb-3">
        <input type="hidden" class="form-control" name="id" placeholder="id" value="<?= $categorie->id ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Libelle </label>
        <input type="text" class="form-control" name="libelle" placeholder="Libelle" value="<?= $categorie->libelle ?>">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="description" rows="6" cols="40" class="form-control"
         placeholder="Content ..."><?= $categorie->description ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Icon </label>
        <input type="text" class="form-control" name="icon" value="<?= $categorie->icon ?>" placeholder="Icon">
    </div>
    <div class="mb-3">
        <input type="submit" class="form-control btn btn-primary" name="edit" value="Modifier categorie">
    </div>
</form>

















<?php

$content = ob_get_clean();
include_once("views/layout.php");

?>