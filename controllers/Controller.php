<?php

namespace Controllers;

use Database;

abstract class Controller
{
    protected $model;
    protected $modelName;
    protected $pdo;


    public function __construct()
    {
        session_start();
        $this->model = new $this->modelName();

        $this->pdo = Database::getPDO();
    }
}
