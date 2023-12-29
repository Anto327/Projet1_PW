<?php

require_once("./classes/models/EducateurModel.php");
require_once("./classes/dao/EducateurDAO.php");


class LoginController
{
    private $educateurDAO;

    public function __construct(EducateurDAO $educateurDAO)
    {
        $this->educateurDAO = $educateurDAO;
    }

    public function index()
    {
        include('./views/login.php');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                $educateur = $this->educateurDAO->getByEmail($email);


                if ($this->verifyLogin($email, $password)) {
                    // Authentification réussie

                    header('Location: index?page=home');
                    exit();
                }


                if (!$educateur) {
                    echo "Authentication failed: User not found.";
                    return;
                }

                if (!password_verify($password, $educateur->getPassword())) {
                    echo "Authentication failed: Incorrect password.";
                    return;
                }

                if (!$educateur->isAdmin()) {
                    echo "Authentication failed: User is not an administrator.";
                    return;
                }



            }
        }

        include './views/home.php';
    }



    private function verifyLogin($email, $password)
    {

        $educateur = $this->educateurDAO->getByEmail($email);

        // Vérifiez si l'éducateur existe, si le mot de passe est correct et s'il est administrateur
        return ($educateur && password_verify($password, $educateur->getPassword()) && $educateur->isAdmin());
    }
}


