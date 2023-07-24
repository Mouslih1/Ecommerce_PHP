<?php

namespace Controllers;

use Http;
use Render;

class blogController extends Controller
{
    protected $modelName = \Models\Blog::class;

    public function indexBlogAction()
    {
        $categories = $this->model->BlogCategories();
        $produits = $this->model->BlogProduits();
        require_once("views/front/indexProduit.php");
    }

    public function showBlogProduitAction()
    {
        $id = $_GET['id'];
        $idUser = $_SESSION['user']['id'];
        $panier = $_SESSION['panier'][$idUser];
        $categories = $this->model->BlogCategories();
        $produit = $this->model->findWithLibelle($id);
        $qty = $panier[$produit->id] ?? 0;
        require_once("views/front/showProduit.php");
    }

    public function findProduitParCategories()
    {
        $id = $_GET['id'];
        $categories = $this->model->BlogCategories();
        $categorie = $this->model->Categorie($id);
        $produits = $this->model->findProduitParCategorie($id);
        require_once("views/front/indexProduit.php");
    }

    public function indexPanier()
    {
        @$id = $_POST['id'];
        @$qty = $_POST['qty'];
        @$idUser = $_SESSION['user']['id'];

        if (!isset($_SESSION['user'])) {
            Http::redirect("index.php?controller=userController&action=connexionAction");
        }

        if (!empty($id)) {
            if (!isset($_SESSION['panier'][$idUser])) {
                $_SESSION['panier'][$idUser] = [];
            }

            if ($qty === '0') {
                unset($_SESSION['panier'][$idUser][$id]);
            } else {
                $_SESSION['panier'][$idUser][$id] = $qty;
            }

            //Http::redirect("index.php?controller=blogController&action=showBlogProduitAction&id=$id");
            Http::redirect($_SERVER["HTTP_REFERER"]);
        }
    }

    public function indexPanierAction()
    {
        $id = $_SESSION['user']['id'];
        $panier = $_SESSION['panier'][$id];
        $idProduits = array_keys($panier);

        if (!empty($idProduits)) {
            $placeholders = implode(',', array_fill(0, count($idProduits), '?'));

            $categories = $this->model->BlogCategories();
            $produits = $this->model->Produits($idProduits, $placeholders);
            require_once("views/front/Panier.php");
        }
        $categories = $this->model->BlogCategories();
        require_once("views/front/Panier.php");
    }

    public function viderPanierAction()
    {
        $id = $_SESSION['user']['id'];
        $_SESSION['panier'][$id] = [];
        Http::redirect("index.php?controller=blogController&action=indexPanierAction");
    }

    public function supprimerPanierAction()
    {
        @$id = $_POST['id'];
        $idUser = $_SESSION['user']['id'];
        if (isset($_SESSION['panier'][$idUser][$id])) {
            unset($_SESSION['panier'][$idUser][$id]);
        }

        Http::redirect($_SERVER['HTTP_REFERER']);
    }

    public function validerPanierAction()
    {
        $idUser = $_SESSION['user']['id'];
        $panier = $_SESSION['panier'][$idUser];
        $idProduits = array_keys($panier);

        if (empty($idProduits)) {
            Http::redirect("index.php?controller=blogController&action=indexPanierAction");
        }

        $placeholders = implode(',', array_fill(0, count($idProduits), '?'));
        $categories = $this->model->BlogCategories();
        $produits = $this->model->Produits($idProduits, $placeholders);


        $totalT = 0;
        $prixProduit = [];
        foreach ($produits as $produit) {
            $id_produit = $produit->id;
            $prix = $produit->prix;
            $qty = $panier[$id_produit];
            $totalT += $prix * $qty;
            $prixProduit[$id_produit] = [
                'id' => $id_produit,
                'prix' => $prix,
                'total' => $prix * $qty,
                'qty' => $qty
            ];
        }

        if (!empty($totalT)) {
            $this->model->validerPanier($idUser, $totalT);

            $id_commande = $this->pdo->lastInsertId();

            foreach ($prixProduit as $produit) {
                $id_produit = $produit['id'];
                $prix = $produit['prix'];
                $total = $produit['total'];
                $qty = $produit['qty'];
                $this->model->enrHistorique($id_produit,$id_commande, $prix, $qty, $total);
            }

            $_SESSION['success_message'] = ['message' => "Valider les commandes ".$totalT ." DH avec success,"];
            $_SESSION['panier'][$idUser] = [];

            Http::redirect("index.php?controller=blogController&action=indexPanierAction");
        }

        require_once("views/front/Panier.php");
    }
}
