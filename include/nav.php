<?php @$user = $_SESSION['user']; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?controller=blogController&action=indexBlogAction">Ecommerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" <?php if (isset($user)) : ?> href="index.php?controller=userController&action=homeAction" <?php else : ?> href="index.php?controller=userController&action=errorAccessAction" <?php endif ?>><i class="fa-solid fa-house"></i>Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-star"></i>Produits
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" <?php if (isset($user)) : ?> href="index.php?controller=produitController&action=produitAction" <?php else : ?> href="index.php?controller=userController&action=errorAccessAction" <?php endif ?>>ajouter produits</a></li>
                        <li><a class="dropdown-item" <?php if (isset($user)) : ?> href="index.php?controller=produitController&action=allProduitAction" <?php else : ?> href="index.php?controller=userController&action=errorAccessAction" <?php endif ?>>all produits</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" <?php if (isset($user)) : ?> href="index.php?controller=categorieController&action=categorieAction" <?php else : ?> href="index.php?controller=userController&action=errorAccessAction" <?php endif ?>><i class="fa-solid fa-bars"></i>Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" <?php if (isset($user)) : ?> href="index.php?controller=commandeController&action=indexCommandeAction" <?php else : ?> href="index.php?controller=userController&action=errorAccessAction" <?php endif ?>><i class="fa-solid fa-cart-shopping"></i>Commandes</a>
                </li>
            </ul>
        </div>
        <div class="d-flex" id="navbarNav">
            <?php
            if (!isset($user)) :
            ?>
                <ul class="navbar-nav">
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="index.php?controller=userController&action=indexAction">Sign up</a>
                    </li>
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="index.php?controller=userController&action=connexionAction">Connexion</a>
                    </li>
                </ul>
            <?php else : ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu" aria-expanded="false">
                        <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div><?= $user['login'] ?></div>
                            <div class="mt-1 small text-muted">Admin</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="index.php?controller=userController&action=logoutAction" class="dropdown-item">Logout</a>
                    </div>
                </div>
            <?php endif ?>
        </div>

    </div>
</nav>