<?php

namespace Models;

use PDO;

class Produit extends Model
{

    protected $table = "produits";
    protected $tableFK = "categories";

    public function Categories()
    {
        $query = $this->pdo->query("SELECT * FROM {$this->tableFK}");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(string $libelle, string $description, int $prix, int $discount,int $categorie, string $image)
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} VALUES(null,?,?,?,?,?,now(),?)");
        $query->execute([$libelle, $description, $prix, $discount, $categorie, $image]);
    }

    public function update(int $id, string $description, string $libelle, int $prix,int $discount,int $categorie,string $image)
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET libelle = ?,description = ?,prix = ?,discount = ?,id_categorie = ?,image = ? WHERE id = ?");
        $query->execute([$libelle, $description, $prix, $discount, $categorie, $image, $id]);
    }

    public function updateSansImage(int $id,string $description,string $libelle,int $prix,int $discount,int $categorie)
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET libelle = ?,description = ?,prix = ?,discount = ?,id_categorie = ? WHERE id = ?");
        $query->execute([$libelle, $description, $prix, $discount, $categorie, $id]);
    }

    
}
