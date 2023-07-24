<?php

namespace Models;

use PDO;
use Database;

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $tableFK;

    public function __construct() 
    {
        $this->pdo = Database::getPDO();
    }

    public function findAll()
    {
        $query = $this->pdo->query("SELECT * FROM {$this->table}");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function findAllWithLibelle()
    {
        $query = $this->pdo->query("SELECT {$this->table}.*, {$this->tableFK}.libelle AS categorie_libelle, {$this->tableFK}.icon AS icon FROM {$this->table} INNER JOIN {$this->tableFK} ON {$this->table}.id_categorie = {$this->tableFK}.id");
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findWithLibelle(int $id)
    {
        $query = $this->pdo->prepare("SELECT {$this->table}.*, {$this->tableFK}.libelle AS categorie_libelle, {$this->tableFK}.icon AS icon FROM {$this->table} INNER JOIN {$this->tableFK} ON {$this->table}.id_categorie = {$this->tableFK}.id WHERE {$this->table}.id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function delete(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $query->execute([$id]);
    }
}