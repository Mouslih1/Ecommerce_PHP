<?php

namespace Controllers;

use Http;
use Render;

class produitController extends Controller
{
    protected $modelName = \Models\Produit::class;

    public function produitAction()
    {
        $categories = $this->model->Categories();
        Render::render("produit", compact('categories'));
    }

    public function allProduitAction()
    {
        $msg = $_SESSION['msg'] ?? '';
        $produits = $this->model->findAllWithLibelle();
        $msg = "Produit not found !!";
        Render::render("allProduit", compact('msg','produits'));
    }

    public function ajouterProduitAction()
    {
        $msg = $_SESSION['msg'] ?? '';
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $discount = $_POST['discount'];
        $categorie = $_POST['categories'];
        $image = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) 
        {
            $targetDir = 'uploads/';
            $targetFile = $targetDir .uniqid().basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = $_FILES['image']['name'];
            }
        }
        $this->model->insert($libelle, $description, $prix, $discount, $categorie, $image);
        Http::redirect("index.php?controller=produitController&action=allProduitAction");
    }

    public function showEditProduitAction()
    {
        $id = $_GET['id'];
        $categories = $this->model->Categories();
        $produit = $this->model->findWithLibelle($id);
        Render::render("editProduit", compact('categories','produit'));
    }

    public function editProduitAction()
    {
        $msg = $_SESSION['msg'] ?? '';
        $id = $_POST['id'];
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $discount = $_POST['discount'];
        $categorie = $_POST['categories'];
        $image = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
        {
            $targetDir = 'uploads/';
            $targetFile = $targetDir .uniqid().basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $image = $_FILES['image']['name'];
            }
            $this->model->update($id, $description, $libelle, $prix, $discount, $categorie, $image);
            Http::redirect("index.php?controller=produitController&action=allProduitAction");
        } else {
            $this->model->updateSansImage($id, $description, $libelle, $prix, $discount, $categorie);
            Http::redirect("index.php?controller=produitController&action=allProduitAction");
        }
    }

    public function deleteProduitAction()
    {
        $id = $_POST['ProduitId'];
        $this->model->delete($id);
        Http::redirect("index.php?controller=produitController&action=allProduitAction");
    }
}
