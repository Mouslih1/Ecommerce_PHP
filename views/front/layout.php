<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?controller=userController&action=homeAction">Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?controller=blogController&action=indexBlogAction"><i class="fa-solid fa-house">Home</i></a>
                    </li>
                    <?php foreach ($categories as $categorie) : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?controller=blogController&action=findProduitParCategories&id=<?= $categorie->id ?>"><i class="fa <?= $categorie->icon ?>"><?= $categorie->libelle ?></i></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <?php  

        $idUser = $_SESSION['user']['id'];
        $panier = $_SESSION['panier'][$idUser];
        define('PRODUCT_COUNT', count($panier));
        
        ?>
        <div >
            <div class="float-end">
                <div>
                    <span class="position-absolute top-3 start-80 translate-middle badge rounded-pill bg-danger">
                        <?= PRODUCT_COUNT ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                    <a class="btn" aria-current="page" href="index.php?controller=blogController&action=indexPanierAction"><i class="fa-solid fa-cart-shopping">Panier</i></a>
                </div>
            </div>
        </div>

    </nav>
    <div class="container mt-3">
        <?= $content ?>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<footer class="bg-dark text-light">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6">
                <h5>Informations</h5>
                <ul class="list-unstyled">
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Conditions d'utilisation</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h5>Contact</h5>
                <address>
                    123 Rue du Commerce<br>
                    Ville, Pays<br>
                    <a href="tel:+123456789">+123456789</a><br>
                    <a href="mailto:info@example.com">info@example.com</a>
                </address>
            </div>
        </div>
    </div>
    <div class="bg-secondary text-center py-2">
        <p class="mb-0">&copy; 2023 MonSiteEcommerce. Tous droits réservés.</p>
    </div>
</footer>

</html>