<?php

$title = "Categorie | " . @$categorie->libelle;
ob_start();

?>
<div class="mt-3 mb-3">
    <h2><?= @$categorie->libelle ?></h2>
</div>
<?php if (empty($produits)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hey !</strong>
        <?= @$categorie->libelle ?> est vide !!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>
<div class="row g-2 align-items-center">
    <div class="row mt-4">
        <?php foreach ($produits as $produit) : ?>
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%;">
                    <a href="#"><img src="uploads/<?= $produit->image ?>" class="card-img-top" alt="<?= $produit->libelle ?>"></a>
                    <div class="card-body">
                        <h5 class="card-title"><?= $produit->libelle ?></h5>
                        <p class="d-flex flex-now justify-content-between align-items-center">
                            <span class="text-muted">
                                <?= $produit->prix ?> DH
                            </span>
                            <span class="badge bg-success">
                                -<?= $produit->discount ?> %
                            </span>
                        </p>
                        <p class="font-weight-blod">
                            <span class="text-success"> Disponible </span>
                        </p>
                        <div class="mb-3">
                            <input type="hidden" class="form-control produit_id" name="id" value="<?= $produit->id ?>" placeholder="id">
                        </div>
                        <p class="font-weight-blod">
                            <span class="">Ajouter le : <?= date_format(date_create($produit->created_at), "Y/m/d") ?> </span>
                        </p>
                        <a href="index.php?controller=blogController&action=showBlogProduitAction&id=<?= $produit->id ?>" class="stretched-link">Lire suite</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php

$content = ob_get_clean();
include_once('views/front/layout.php');

?>