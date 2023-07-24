<?php

$title = "All produits";

?>
<div class="modal fade" id="deleteProduitModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteProduitModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProduitModalLabel">Supprimer produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?controller=produitController&action=deleteProduitAction" method="POST">
                <div class="modal-body">
                    <h4>Voulez-vous supprimer cette produit ?</h4>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="ProduitId" id="deleteId" placeholder="id">
                    </div>
                </div>
                <div class="modal-footer mb-3">
                    <button type="button" class="form-control btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="form-control btn btn-danger" value="supprimer categorie">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="mt-3 mb-3">
    <h2>All produits</h2>
</div>
<div class="row g-2 align-items-center">
    <div class="card">
        <div class="card-body">
            <a href="index.php?controller=produitController&action=produitAction" class="btn btn-primary">Ajouter new produit</a>
        </div>
    </div>
    <div class="row mt-4">
        <?php foreach ($produits as $produit) : ?>
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 100%;">

                    <img src="uploads/<?= $produit->image ?>" class="card-img-top" alt="<?= $produit->libelle ?>">
                    <div class="card-body">
                        <div class="mb-3">
                            <input type="hidden" class="form-control produit_id" name="id" value="<?= $produit->id ?>" placeholder="id">
                        </div>
                        <h5 class="card-title"><?= $produit->libelle ?></h5>
                        <p class="text-dark font-weight-bold">
                        <h6><?= $produit->categorie_libelle ?></h6>
                        </p>
                        <p class="d-flex flex-now justify-content-between align-items-center">
                            <span class="text-muted">
                                <?= $produit->prix ?> DH
                            </span>
                            <span class="text-danger">
                                <strike> <?= $produit->discount ?> %</strike>
                            </span>
                        </p>
                        <p class="font-weight-blod">
                            <span class="text-success"> Disponible </span>
                        </p>
                        <a href="index.php?controller=produitController&action=showEditProduitAction&id=<?= $produit->id ?>" class="btn btn-warning">Modifier</a>
                        <a href="#" class="btn btn-danger delete_btn">Supprimer</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <div class="mt-3 mb-3">
            <center>
                <?php if (count($produits) === 0) : ?>
                    <span class="text-danger">Aucune produits disponible</span>
                <?php endif ?>
            </center>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(".delete_btn").click(function(e) {
            e.preventDefault();
            var produit_id = $(this).closest('.card-body').find('.produit_id').val();
            $("#deleteId").val(produit_id);
            $("#deleteProduitModal").modal("show");
        });

    });
</script>