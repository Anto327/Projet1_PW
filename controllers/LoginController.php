<?php

class LoginController extends Controller
{
    // Authentication constants
    private const AUTH_SUCCESS = 1;
    private const USER_NOT_FOUND = 2;
    private const WRONG_PASSWORD = 3;
    private const NOT_ADMIN = 4;

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

                $loginResponse = $this->verifyLogin($email, $password);

                if ($loginResponse['status'] == LoginController::AUTH_SUCCESS) {
                    // Authentification réussie
                    header('Location:index.php?page=home');
                    exit();
                } else {
                    echo "\n" . $loginResponse['message'];
                }
            }
        }

        include './views/login.php';
    }

    private function verifyLogin($email, $password)
    {
        $educateur = $this->educateurDAO->getByEmail($email);
        $response = [
            'status' => LoginController::AUTH_SUCCESS,
            'message' => 'Authentication success !'
        ];

        // Vérifiez si l'éducateur existe, si le mot de passe est correct et s'il est administrateur
        if (!$educateur) {
            $response['status'] = LoginController::USER_NOT_FOUND;
            $response['message'] = "Authentication failed: User not found.";
        } else if (!password_verify($password, $educateur->getPassword())) {
            $response['status'] = LoginController::WRONG_PASSWORD;
            $response['message'] = "Authentication failed: Incorrect password.";
        } else if (!$educateur->isAdmin()) {
            $response['status'] = LoginController::NOT_ADMIN;
            $response['message'] = "Authentication failed: User is not an administrator.";
        }

        return $response;
    }

    public function add()
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function create()
    {
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }
}
