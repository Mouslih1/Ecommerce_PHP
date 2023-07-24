<?php

namespace Models;

use PDO;

class User extends Model
{

    protected $table = "users";

    public function insert()
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = $this->pdo->prepare("INSERT INTO {$this->table} VALUES(null,?,?,now())");
        $query->execute([$login, $hashPassword]);
    }

    public function login(string $login, string $password)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE login = ?");
        $query->execute([$login]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) 
        {
            return $user;
        }

        return false;
    }
}
