<?php

class EducateurController extends Controller
{
    public function index()
    {
        $educateurs =  $this->educateurDAO->getAll();
        include('./views/educateurs/homeView.php');
    }

    public function add()
    {
        $categories =  $this->categorieDAO->getAll();
        include('./views/educateurs/addView.php');
    }

    public function show($id)
    {
        $educateur = $this->educateurDAO->getById($id);
        include('./views/educateurs/showView.php');
    }

    public function edit($id)
    {
        $categories = $this->categorieDAO->getAll();
        $educateur = $this->educateurDAO->getById($id);
        include('./views/educateurs/editView.php');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $num_licence = $_POST['num_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $id_categorie = $_POST['id_categorie'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $is_admin = $_POST['is_admin'] == 'on' ? true : false;

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            $educateur = new EducateurModel(0, $num_licence, $nom, $prenom, $id_categorie, $email, $password, $is_admin, 0);
            if ($this->educateurDAO->create($educateur)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index?page=educateurs');
                exit();
            } else {
                // Gérer les erreurs d'ajout de educateur
                echo "\nErreur lors de l'ajout du educateur.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de educateur
        include('./views/educateurs/addView.php');
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }
}
