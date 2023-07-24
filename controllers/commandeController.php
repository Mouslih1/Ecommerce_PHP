<?php

namespace Controllers;

use Http;
use Render;

class commandeController extends Controller
{
    protected $modelName = \Models\Commande::class;

    public function indexCommandeAction()
    {
        $commandes = $this->model->Commandes();
        Render::render("commande", compact('commandes'));
    }

    public function showDetailAction()
    {
        $id = $_GET['id'];
        $commande = $this->model->findCommande($id);
        $details = $this->model->findDetailCommande($id); 
        Render::render("detailCommande", compact('commande', 'details'));
    }

    public function updateCommandeAction()
    {
        $id = $_GET['id'];
        $etat = $_GET['etat'];
        $this->model->updateCommande($id,$etat);
        Http::redirect("index.php?controller=commandeController&action=showDetailAction&id=$id");
    }
}