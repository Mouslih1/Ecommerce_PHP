<?php

namespace Models;

use PDO;

class Commande extends Model
{
    protected $table = "commandes";
    protected $tableFK = "ligne_commande";

    public function Commandes()
    {
        $query = $this->pdo->query("SELECT {$this->table}.* ,users.login FROM {$this->table} INNER JOIN users ON {$this->table}.id_client = users.id ORDER BY {$this->table}.created_at DESC");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findCommande(int $id)
    {
        $query = $this->pdo->prepare("SELECT {$this->table}.* ,users.login FROM {$this->table} INNER JOIN users ON {$this->table}.id_client = users.id WHERE {$this->table}.id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function findDetailCommande(int $id)
    {
        $query = $this->pdo->prepare("SELECT {$this->tableFK}.*, produits.libelle, produits.image FROM {$this->tableFK} INNER JOIN produits ON {$this->tableFK}.id_produit = produits.id WHERE {$this->tableFK}.id_commande = ?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateCommande(int $id, int $etat)
    {
        $query = $this->pdo->prepare("UPDATE commandes SET valider = ? WHERE id = ? ");
        $query->execute([$etat,$id]);
    }
}
