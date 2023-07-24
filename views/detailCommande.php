<?php

$title = "Commande de  ($commande->login) ";

?>
<div class="mt-4 mb-4">
    <h2><?= $title ?></h2>
</div>

<?php if (empty($commande)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hey !</strong>
        Rien de details commande effectue !!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif ?>
<div class="container mt-4 mb-4">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Total</th>
                <th>Valide</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?= $commande->id ?></th>
                <td><?= $commande->login ?></td>
                <td><?= $commande->total ?> DH</td>
                <td>
                    <?php if ($commande->valider == 1) : ?>
                        <span class="text-success"><i class="fa-solid fa-check"></i></span>
                    <?php else : ?>
                        <span class="text-danger"><i class="fa-solid fa-x"></i></span>
                    <?php endif ?>
                </td>
                <td><?= $commande->created_at ?></td>
                <td>
                    <?php if ($commande->valider == 0) : ?>
                        <a href="index.php?controller=commandeController&action=updateCommandeAction&id=<?= $commande->id ?>&etat=1" class="btn btn-success">Valider la commande</a>
                    <?php else : ?>
                        <a href="index.php?controller=commandeController&action=updateCommandeAction&id=<?= $commande->id ?>&etat=0" class="btn btn-danger">Annuler la validation</a>
                    <?php endif ?>
                </td>
            </tr>
        </tbody>
    </table>

    <h2>Details des produits</h2>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($details as $detail) : ?>
                <tr>
                    <th><?= $detail->id ?></th>
                    <td><img src="uploads/<?= $detail->image ?>" width="50" alt=""></td>
                    <td><?= $detail->libelle ?> DH</td>
                    <td><?= $detail->prix ?></td>
                    <td>x<?= $detail->qty ?></td>
                    <td><?= $detail->total ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="float-end mb-4">
        <a href="index.php?controller=commandeController&action=indexCommandeAction" class="btn btn-warning">Retour à les commandes</a>
    </div>
</div>