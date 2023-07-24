<?php

$title = "Liste des commandes ";

?>
<div class="mt-4 mb-4">
    <h2><?= $title ?>(<?= count($commandes) ?>)</h2>
</div>

<?php if (empty($commandes)) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hey !</strong>
        Rien de commandes effectue !!
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
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande) : ?>

                <tr>
                    <th><?= $commande->id ?></th>
                    <td><?= $commande->login ?></td>
                    <td><?= $commande->total ?> DH</td>
                    <td><?= $commande->created_at ?></td>
                    <td>
                        <a href="index.php?controller=commandeController&action=showDetailAction&id=<?= $commande->id ?>" class="btn btn-primary">Show Details</a>
                    </td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
</div>


