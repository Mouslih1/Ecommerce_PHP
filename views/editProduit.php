<?php

$title = "Modifier produit";

?>

<div class="mt-3 mb-3">
    <h2>Modifier produit</h2>
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

<form action="index.php?controller=produitController&action=editProduitAction" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="hidden" class="form-control" name="id" placeholder="id" value="<?= $produit->id ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Libelle </label>
        <input type="text" class="form-control" name="libelle" placeholder="Libelle" value="<?= $produit->libelle ?>" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <textarea name="description" rows="6" cols="40" class="form-control" placeholder="Content ..."><?= $produit->description ?></textarea>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix" placeholder="Prix" value="<?= $produit->prix ?>" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Discount</label>
        <input type="range" class="form-control" name="discount" value="<?= $produit->discount ?>" placeholder="Discount" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Catégories</label>
        <select class="form-select" name="categories" aria-label="Default select example" required>
            <option value="<?= $produit->id_categorie ?>"><?= $produit->categorie_libelle ?></option>
            <?php foreach ($categories as $categorie) : ?>
                <?php if ($categorie->id != $produit->id_categorie) : ?>
                    <option value="<?= $categorie->id ?>"><?= $categorie->libelle ?></option>
                <?php endif ?>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image" placeholder="Image">
        <img src="uploads/<?= $produit->image ?>" width="200" class="img img-fluid mt-3" alt="<?= $produit->libelle ?>">
    </div>
    <div class="mb-3">
        <input type="submit" class="form-control btn btn-primary" name="edit" value="Modifier produit">
    </div>
</form>
