<?php

namespace Models;

class Categorie extends Model
{
    protected $table = "categories";

    public function insert($libelle, $description, $icon)
    {
        $query = $this->pdo->prepare("INSERT INTO {$this->table} VALUES(null,?,?,now(),?)");
        $query->execute([$libelle, $description, $icon]);
    }

    public function update($id, $libelle, $description, $icon)
    {
        $query = $this->pdo->prepare("UPDATE {$this->table} SET libelle = ?,description = ?,icon = ? WHERE id = ?");
        $query->execute([$libelle, $description,$icon, $id]);
    }
}
