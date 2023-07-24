<?php

$title = "Catégories";

?>
<!-- Modal -->
<div class="modal fade" id="deleteCategorieModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCategorieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategorieModalLabel">Supprimer catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?controller=categorieController&action=deleteCategorieAction" method="POST">
                <div class="modal-body">
                    <h4>Voulez-vous supprimer cette catégorie ?</h4>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="categorieId" id="deleteId" placeholder="id">
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

<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <h3>Categories</h3>
                    <li class="nav-item ms-auto">
                        <a class="btn btn-sm btn-primary" href="index.php?controller=categorieController&action=showCreateCategorieAction">Add categorie</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Icon</th>
                                <th>Categories</th>
                                <th>Description</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody id="sortable_category">
                            <?php foreach ($categories as $categorie) : ?>
                                <tr>
                                    <td class="categorie_id"><?= $categorie->id ?></td>
                                    <td><i class="fa <?= $categorie->icon ?>"></i></td>
                                    <td><?= $categorie->libelle ?></td>
                                    <td class="text-muted"><?= substr($categorie->description, 0, 25) ?>...</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="index.php?controller=categorieController&action=showEditCategorieAction&id=<?= $categorie->id ?>" class="btn btn-sm btn-warning">Edit</a> &nbsp;
                                            <a href="" class="btn btn-sm btn-danger delete_btn">Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <div class="mt-3 mb-3">
                                <center>
                                    <?php if (count($categories) === 0) : ?>
                                        <span class="text-danger">Aucune catégorie disponible</span>
                                    <?php endif ?>
                                </center>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $(".delete_btn").click(function(e) {
            e.preventDefault();
            var categorie_id = $(this).closest("tr").find(".categorie_id").text();
            $("#deleteId").val(categorie_id);
            $("#deleteCategorieModal").modal("show");
        });
    });
</script>