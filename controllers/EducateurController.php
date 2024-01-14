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
        $categories = $this->categorieDAO->getAll();
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
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $is_admin = isset($_POST['is_admin']) ? 1 : 0;

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            $educateur = new EducateurModel(0, $num_licence, $nom, $prenom, $id_categorie, $email, $password, $is_admin, 0);
            if ($this->educateurDAO->create($educateur)) {
                $_SESSION['flashMsg'] = [
                    'status' => 'success',
                    'msg' => "L'éducateur a bien été ajouté !"
                ];
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index?page=educateurs');
                exit();
            } else {
                // Gérer les erreurs d'ajout de educateur
                $_SESSION['flashMsg'] = [
                    'status' => 'danger',
                    'msg' => "Erreur lors de l'ajout de l'éducateur."
                ];
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

            // Mettre à jour les détails de l'éducateur
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
                $_SESSION['flashMsg'] = [
                    'status' => 'success',
                    'msg' => "L'éducateur a bien été modifié !"
                ];
                // Rediriger vers la page de détails de l'éducateur après la modification
                header('Location:index.php?page=educateurs&action=edit&id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour de l'éducateur
                $_SESSION['flashMsg'] = [
                    'status' => 'danger',
                    'msg' => "Erreur lors de la modification de l'éducateur."
                ];
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
                $_SESSION['flashMsg'] = [
                    'status' => 'success',
                    'msg' => "L'éducateur a bien été supprimé !"
                ];
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=educateurs');
                exit();
            } else {
                // Gérer les erreurs de suppression de l'éducateur
                $_SESSION['flashMsg'] = [
                    'status' => 'danger',
                    'msg' => "Erreur lors de la suprresion de l'éducateur."
                ];
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression de l'éducateur
        include('views/educateurs/deleteView.php');
    }
}
