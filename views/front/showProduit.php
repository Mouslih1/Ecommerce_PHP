<?php

$title = "Categorie | <?= $produit->categorie_libelle ?>";
ob_start();
$button = $qty == 0 ? 'Ajouter' : 'Modifier';

?>
<div class="mt-3 mb-3">
    <h2>Categorie | <i class="fa <?= $produit->icon ?>"><?= $produit->categorie_libelle ?></i></h2>
</div>
<div class="container row g-2 align-items-center">
    <div class="row mt-4">
        <div class="col-md-6 mb-3">
            <a href="#"><img src="uploads/<?= $produit->image ?>" class="img img-fluid w-75" alt="<?= $produit->libelle ?>"></a>
        </div>
        <div class="col-md-6">
            <h3 class="card-title"><?= $produit->libelle ?></h3>
            <p><?= $produit->description ?></p>
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
            <form action="index.php?controller=blogController&action=indexPanier" method="POST">
                <div class="container d-flex mb-3 mt-3">
                    <button onclick="return false;" class="btn btn-primary mx-2 conter_moins">-</button>
                    <input type="hidden" class="form-control" name="id" value="<?= $produit->id ?>" placeholder="id">
                    <input type="number" class="form-control"  name="qty" min="0" max="99" id="qty" value="<?= $qty ?>" placeholder="Quantité">
                    <button onclick="return false;" class="btn btn-primary mx-2 conter_plus ">+</button>
                </div>
                <input type="submit" value="<?= $button ?> au panier" class="btn btn-primary" name="ajouter">
                <a href="index.php?controller=blogController&action=indexBlogAction" class="btn btn-danger">Annuler</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(".conter_plus").click(function(e) {
        let qty = $(e.currentTarget).siblings("#qty");
        let qtyValue = parseInt(qty.val()) + 1
        if (qtyValue >= 99) {
            qtyValue = 99;
        }
        qty.val(qtyValue)
    });

    $(".conter_moins").click(function(e) {
        let qty = $(e.currentTarget).siblings("#qty");
        let qtyValue = parseInt(qty.val()) - 1
        if (qtyValue < 0) {
            qtyValue = 0;
        }
        qty.val(qtyValue)
    });
</script>

<?php

$content = ob_get_clean();
include_once('views/front/layout.php');

?>