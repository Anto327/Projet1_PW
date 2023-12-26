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
            $is_admin = $_POST['is_admin'] == 'on' ? 1 : 0;

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
    }

    public function update($id)
    {
        // Récupérer le educateur à modifier en utilisant son ID
        $educateur = $this->educateurDAO->getById($id);

        if (!$educateur) {
            // Le educateur n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "L'éducateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $num_licence = $_POST['num_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $id_categorie = $_POST['id_categorie'];
            $email = $_POST['email'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du educateur
            $educateur->setNumLicence($num_licence);
            $educateur->setNom($nom);
            $educateur->setPrenom($prenom);
            $educateur->setIdCategorie($id_categorie);
            $educateur->setEmail($email);
            $educateur->setIsAdmin(isset($_POST['is_admin']) ? 1 : 0);
            if (isset($_POST['password'])) {
                $password = $_POST['password'];
                $educateur->setPassword($password);
            }
            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le educateur
            if ($this->educateurDAO->update($educateur)) {
                // Rediriger vers la page de détails du educateur après la modification
                header('Location:index.php?page=educateurs&action=edit&id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du educateur
                echo "Erreur lors de la modification du educateur.";
            }
        }
    }

    public function delete($id)
    {
        // Récupérer le educateur à supprimer en utilisant son ID
        $educateur = $this->educateurDAO->getById($id);

        if (!$educateur) {
            // Le educateur n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le educateur n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le educateur en appelant la méthode du modèle (ContactDAO)
            if ($this->educateurDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=educateurs');
                exit();
            } else {
                // Gérer les erreurs de suppression du educateur
                echo "Erreur lors de la suppression de l'éducateur.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du educateur
        include('views/educateurs/deleteView.php');
    }
}
