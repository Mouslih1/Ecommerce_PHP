<?php

namespace Controllers;

use Http;
use Render;

class userController extends Controller
{
    protected $modelName = \Models\User::class;

    public function indexAction()
    {
        Render::render("signup");
    }

    public function insertAction()
    {
        $msg = $_SESSION['msg'] ?? '';
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $confPassword = $_POST['confPassword'] ?? '';

        if (!empty($login) && !empty($password) && !empty($confPassword)) {
            if ($password !== $confPassword) {
                $msg = "Le mot de passe et la confirmation du mot de passe ne correspondent pas !";
                Render::render("signup", compact('msg'));
            } else {
                $this->model->insert();
                //header("location: index.php?action=connexionAction");
                //exit;
                Http::redirect("index.php?controller=userController&action=connexionAction");
            }
        } else {
            $msg = "Veuillez saisir le login, le mot de passe et la confirmation du mot de passe !";
            Render::render("signup", compact('msg'));
        }
    }

    public function connexionAction()
    {
        Render::render("connexion");
    }

    public function loginAction()
    {
        $msg = $_SESSION['msg'] ?? '';
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $login = $this->model->login($login, $password);
        if ($login) {
            $_SESSION['user'] = $login;
            Http::redirect("index.php?controller=userController&action=homeAction");
        } else {
            $msg = "Identifiant ou mot de passe incorrect !";
            Render::render("connexion", compact('msg'));
        }
    }

    public function homeAction()
    {
        @$user = $_SESSION['user'];
        if (isset($user)) 
        {
            Render::render("home");
        }else{
            Render::render("connexion");
        }
    }

    public function errorAccessAction()
    {
        Render::render("errorAccess");
    }

    public function logoutAction()
    {
        $_SESSION = array();
        session_destroy();
        Http::redirect("index.php?controller=userController&action=connexionAction");
    }
}
