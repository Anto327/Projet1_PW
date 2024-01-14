<?php

class CategorieController extends Controller
{

    public function index()
    {
        $categories =  $this->categorieDAO->getAll();
        include('./views/categories/homeView.php');
    }

    public function add()
    {
        include('./views/categories/addView.php');
    }

    public function show($id)
    {
        $categorie = $this->categorieDAO->getById($id);
        include('./views/categories/showView.php');
    }

    public function edit($id)
    {
        $categorie = $this->categorieDAO->getById($id);
        include('./views/categories/editView.php');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            $categorie = new CategorieModel(0, $nom, $code);
            if ($this->categorieDAO->create($categorie)) {
                $_SESSION['flashMsg'] = [
                    'status' => 'success',
                    'msg' => "La catégorie a bien été ajoutée !"
                ];
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index.php?page=categories');
                exit();
            } else {
                // Gérer les erreurs d'ajout de categorie
                $_SESSION['flashMsg'] = [
                    'status' => 'danger',
                    'msg' => "Erreur lors de l'ajout de la catégorie."
                ];
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de categorie
        include('./views/categories/addView.php');
    }

    public function update($id)
    {
        // Récupérer le categorie à modifier en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            // Le categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $code = $_POST['code'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du categorie
            $categorie->setNom($nom);
            $categorie->setCode($code);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le categorie
            if ($this->categorieDAO->update($categorie)) {
                // Rediriger vers la page de détails du categorie après la modification
                header('Location:index.php?page=categories&action=edit&id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du categorie
                echo "Erreur lors de la modification de la catégorie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du categorie
        include('./views/categories/editView.php');
    }

    public function delete($id)
    {
        // Récupérer le categorie à supprimer en utilisant son ID
        $categorie = $this->categorieDAO->getById($id);

        if (!$categorie) {
            // Le categorie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le categorie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le categorie en appelant la méthode du modèle (ContactDAO)
            if ($this->categorieDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=categories');
                exit();
            } else {
                // Gérer les erreurs de suppression du categorie
                echo "Erreur lors de la suppression du categorie.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du categorie
        include('views/categories/deleteView.php');
    }
}
