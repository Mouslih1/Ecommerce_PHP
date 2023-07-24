<?php

namespace Controllers;

use Http;
use Render;

class categorieController extends Controller
{
    protected $modelName = \Models\Categorie::class;

    public function categorieAction()
    {
        $categories = $this->model->findAll();
        Render::render("categorie", compact('categories'));
    }

    public function showCreateCategorieAction()
    {
        Render::render("CreateCategorie");
    }

    public function ajouterCategorieAction()
    {
        $error = $_SESSION['error'] ?? '';
        $libelle = $_POST['libelle'] ?? '';
        $description = $_POST['description'] ?? '';
        $icon = $_POST['icon'] ?? '';


        if (!empty($libelle) && !empty($description) && !empty($icon)) 
        {
            $this->model->insert($libelle, $description, $icon);
            Http::redirect("index.php?controller=categorieController&action=categorieAction");
        } else {
            $error = "Obligatiore de saisie les champs !!"; 
            Render::render("CreateCategorie", compact('error'));
        }
    }

    public function showEditCategorieAction()
    {
        $id = $_GET['id'] ?? '';
        $categorie = $this->model->find($id);
        Render::render("editCategorie", compact('categorie'));
    }

    public function editCategorieAction()
    {
        $msg = $_SESSION['msg'] ?? '';
        $id = $_POST['id'] ?? '';
        $libelle = $_POST['libelle'] ?? '';
        $description = $_POST['description'] ?? '';
        $icon = $_POST['icon'] ?? '';

        if (!empty($libelle) && !empty($description) && !empty($icon)) 
        {
            $this->model->update($id, $libelle, $description, $icon);
            Http::redirect("index.php?controller=categorieController&action=categorieAction");
        } else {
            $msg = "Obligatiore de saisie les champs !!";
            Http::redirect("index.php?controller=categorieController&action=showEditCategorieAction&id=$id");
        }
    }

    public function deleteCategorieAction()
    {
        $id = $_POST['categorieId'];
        $this->model->delete($id);
        Http::redirect("index.php?controller=categorieController&action=categorieAction");
    }
}
