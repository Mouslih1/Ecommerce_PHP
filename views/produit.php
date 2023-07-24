<?php

$title = "Ajouter produit";

?>
<div class="mt-3 mb-3">
    <h2>Ajouter produit</h2>
</div>
<?php if (isset($msg)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hey !</strong>
        <?php
        echo $msg;
        unset($msg);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>

<form action="index.php?controller=produitController&action=ajouterProduitAction" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Libelle </label>
        <input type="text" class="form-control" name="libelle" placeholder="Libelle" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="description" rows="6" cols="40" class="form-control" placeholder="Content ..."></textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix" placeholder="Prix" min="0" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Discount</label>
        <input type="range" class="form-control" name="discount" placeholder="Discount" min="0" max="90" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Catégories</label>
        <select class="form-select" name="categories" aria-label="Default select example" required>
            <option value="">Choisissez une catégorie</option>
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie->id ?>"><?= $categorie->libelle ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" placeholder="Image" required>
    </div>
    <div class="mb-3">
        <input type="submit" class="form-control btn btn-primary" name="ajouter" value="Ajouter produit">
    </div>
</form>


