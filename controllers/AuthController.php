<?php

class AuthController extends Controller
{
    // Authentication constants
    private const AUTH_SUCCESS = 1;
    private const USER_NOT_FOUND = 2;
    private const WRONG_PASSWORD = 3;
    private const NOT_ADMIN = 4;

    public function index()
    {
        include('./views/login.php');
        exit();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                $loginResponse = $this->verifyLogin($email, $password);

                if ($loginResponse['status'] == AuthController::AUTH_SUCCESS) {
                    // Authentification réussie
                    $_SESSION['valid'] = true;
                    $_SESSION['email'] = $email;

                    header('Location:index.php?page=home');
                    exit();
                } else {
                    $_SESSION['flashMsg'] = [
                        'status' => 'danger',
                        'msg' => $loginResponse['message']
                    ];
                }
            }
        }

        include './views/login.php';
    }

    private function verifyLogin($email, $password)
    {
        $educateur = $this->educateurDAO->getByEmail($email);
        $response = [
            'status' => AuthController::AUTH_SUCCESS,
            'message' => 'Authentication success !'
        ];

        // Vérifiez si l'éducateur existe, si le mot de passe est correct et s'il est administrateur
        if (!$educateur) {
            $response['status'] = AuthController::USER_NOT_FOUND;
            $response['message'] = "Authentication failed: User not found.";
        } else if (!password_verify($password, $educateur->getPassword())) {
            $response['status'] = AuthController::WRONG_PASSWORD;
            $response['message'] = "Authentication failed: Incorrect password.";
        } else if (!$educateur->isAdmin()) {
            $response['status'] = AuthController::NOT_ADMIN;
            $response['message'] = "Authentication failed: User is not an administrator.";
        }

        return $response;
    }

    public function logout()
    {
        unset($_SESSION["valid"]);
        unset($_SESSION["email"]);
        header('Location:index.php?page=auth');
        exit();
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
