<?php

class LicencieController extends Controller
{

    public function index()
    {
        $licencies =  $this->licencieDAO->getAll();
        include('./views/licencies/homeView.php');
    }

    public function add()
    {
        $categories =  $this->categorieDAO->getAll();
        include('./views/licencies/addView.php');
    }

    public function show($id)
    {
        $licencie = $this->licencieDAO->getById($id);
        include('./views/licencies/showView.php');
    }

    public function edit($id)
    {
        $categories = $this->categorieDAO->getAll();
        $licencie = $this->licencieDAO->getById($id);
        include('./views/licencies/editView.php');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $num_licence = $_POST['num_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $id_categorie = $_POST['id_categorie'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            $licencie = new LicencieModel(0, $num_licence, $nom, $prenom, $id_categorie);
            if ($this->licencieDAO->create($licencie)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:index?page=licencies');
                exit();
            } else {
                // Gérer les erreurs d'ajout de licencie
                echo "\nErreur lors de l'ajout du licencie.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de licencie
        include('./views/licencies/addView.php');
    }

    public function update($id)
    {
        // Récupérer le licencie à modifier en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);

        if (!$licencie) {
            // Le licencie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $num_licence = $_POST['num_licence'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $id_categorie = $_POST['id_categorie'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du licencie
            $licencie->setNumLicence($num_licence);
            $licencie->setNom($nom);
            $licencie->setPrenom($prenom);
            $licencie->setIdCategorie($id_categorie);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le licencie
            if ($this->licencieDAO->update($licencie)) {
                // Rediriger vers la page de détails du licencie après la modification
                header('Location:index.php?page=licencies&action=edit&id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du licencie
                echo "Erreur lors de la modification du licencie.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du licencie
        include('./views/licencies/editView.php');
    }

    public function delete($id)
    {
        // Récupérer le licencie à supprimer en utilisant son ID
        $licencie = $this->licencieDAO->getById($id);

        if (!$licencie) {
            // Le licencie n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le licencie n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le licencie en appelant la méthode du modèle (ContactDAO)
            if ($this->licencieDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=licencies');
                exit();
            } else {
                // Gérer les erreurs de suppression du licencie
                echo "Erreur lors de la suppression du licencie.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du licencie
        include('views/licencies/deleteView.php');
    }
}
