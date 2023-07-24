<?php

namespace Models;

use PDO;

class Blog extends Model
{
    protected $table = "produits";
    protected $tableFK = "categories";

    public function BlogProduits()
    {
        $query = $this->pdo->query("SELECT * FROM {$this->table}");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function BlogCategories()
    {
        $query = $this->pdo->query("SELECT * FROM {$this->tableFK}");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findWithLibelle(int $id)
    {
        $query = $this->pdo->prepare("SELECT {$this->table}.*, {$this->tableFK}.libelle AS categorie_libelle, {$this->tableFK}.icon AS icon FROM {$this->table} INNER JOIN {$this->tableFK} ON {$this->table}.id_categorie = {$this->tableFK}.id WHERE {$this->table}.id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function findProduitParCategorie(int $id)
    {
        $query = $this->pdo->prepare("SELECT {$this->table}.*, {$this->tableFK}.libelle AS categorie_libelle, {$this->tableFK}.icon AS icon FROM {$this->table} INNER JOIN {$this->tableFK} ON {$this->table}.id_categorie = {$this->tableFK}.id WHERE {$this->table}.id_categorie = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function Categorie(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->tableFK} WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function Produits($ids,$placeholders)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id IN ($placeholders)");
        $query->execute($ids);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function validerPanier(int $id_client,int $total)
    {
        $query = $this->pdo->prepare("INSERT INTO commandes (id_client, total, created_at) VALUES(?,?,now())");
        $query->execute([$id_client,$total]);
    }

    public function enrHistorique(int $id_produit,int $id_commande,int $prix , int $qty, int $total)
    {
        $query = $this->pdo->prepare("INSERT INTO ligne_commande VALUES(null,?,?,?,?,?)");
        $query->execute([$id_produit,$id_commande,$prix,$qty,$total]);
    }
}
