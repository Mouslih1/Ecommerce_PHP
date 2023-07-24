<?php

$title = "Panier";
ob_start();

?>
<div class="mt-3 mb-3">
    <h2><?= $title ?>(<?= count($panier) ?>)</h2>
</div>
<?php if (empty($panier)) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey !</strong>
        <?php if (isset($_SESSION['success_message']) && is_array($_SESSION['success_message'])): ?>
            <?= $_SESSION['success_message']['message']; ?>
            <?php $_SESSION['success_message'] = null; ?>
        <?php endif; ?>
        Panier est vide !!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>



<?php if(!empty($produits)): ?>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Libelle</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Total</the=>
        </tr>
    </thead>
    <tbody>
        <?php

        foreach ($produits as $produit) :

            $totalProduitProduit = $produit->prix * $panier[$produit->id];
            @$totalProduit += $totalProduitProduit;

        ?>
            <tr>
                <th><?= $produit->id ?></th>
                <td><img src="uploads/<?= $produit->image ?>" class="" width="70px"></td>
                <td><?= $produit->libelle ?></td>
                <td><?= $produit->prix ?> DH</td>
                <td>
                    <form action="index.php?controller=blogController&action=indexPanier" method="POST">

                        <div class="container d-flex mb-3 mt-3">
                            <button onclick="return false;" class="btn btn-primary mx-2 conter_moins">-</button>
                            <input type="hidden" class="form-control" name="id" value="<?= $produit->id ?>" placeholder="id">
                            <input type="number" class="form-control" name="qty" min="0" max="99" id="qty" value="<?= $panier[$produit->id] ?>" placeholder="Quantité">
                            <button onclick="return false;" class="btn btn-primary mx-2 conter_plus ">+</button>
                        </div>

                        <input type="submit" class=" btn btn-warning" name="modifier" value="Modifier">
                        <input formaction="index.php?controller=blogController&action=supprimerPanierAction" type="submit" class=" btn btn-danger" name="supprimer" value="Supprimer">

                    </form>
                </td>
                <td><?= $produit->prix * $panier[$produit->id] ?> DH</td>
            </tr>

        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" align="right"><strong>Total</strong></td>
            <td><?= @$totalProduit ?> DH</td>
        </tr>
        <tr>
            <td colspan="6" align="right">
                <form action="index.php?controller=blogController&action=validerPanierAction" method="POST">
                    <input type="submit" name="valider" class="btn btn-success" value="Valider les commandes">
                    <a onclick="return confirm('Voulez-vous vider cette panier ?')"  href="index.php?controller=blogController&action=viderPanierAction" name="vider" class="btn btn-danger">Vider panier</a>
                </form>
            </td>
        </tr>
    </tfoot>
</table>
<?php endif ?>
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
require_once('views/front/layout.php');

?>