<?php

require_once("./config/Connexion.php");
require_once("./classes/models/ContactModel.php");
require_once("./classes/dao/ContactDAO.php");

class ContactController
{
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO)
    {
        $this->contactDAO = $contactDAO;
    }

    public function index()
    {
        $contacts =  $this->contactDAO->getAll();
        include('./views/contacts/list_contact.php');
    }

    public function add()
    {
        include('./views/contacts/add_contact.php');
    }

    public function show()
    {
        $id = $_GET['id'];
        $contact = $this->contactDAO->getById($id);
        include('./views/contacts/view_contact.php');
    }

    public function edit()
    {
        $id = $_GET['id'];
        $contact = $this->contactDAO->getById($id);
        include('./views/contacts/edit_contact.php');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            $nouveauContact = new ContactModel(0, $nom, $prenom, $email, $telephone);
            if ($this->contactDAO->create($nouveauContact)) {
                // Rediriger vers la page d'accueil après l'ajout
                header('Location:?page=contacts');
                exit();
            } else {
                // Gérer les erreurs d'ajout de contact
                echo "Erreur lors de l'ajout du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire d'ajout de contact
        include('./views/create_contact.php');
    }

    public function update($id)
    {
        // Récupérer le contact à modifier en utilisant son ID
        $contact = $this->contactDAO->getById($id);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            // Valider les données du formulaire (ajoutez des validations si nécessaire)

            // Mettre à jour les détails du contact
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setTelephone($telephone);

            // Appeler la méthode du modèle (ContactDAO) pour mettre à jour le contact
            if ($this->contactDAO->update($contact)) {
                // Rediriger vers la page de détails du contact après la modification
                header('Location:index.php?page=contacts&action=update&id=' . $id);
                exit();
            } else {
                // Gérer les erreurs de mise à jour du contact
                echo "Erreur lors de la modification du contact.";
            }
        }

        // Inclure la vue pour afficher le formulaire de modification du contact
        include('./views/contacts/edit_contact.php');
    }

    public function delete($id)
    {
        // Récupérer le contact à supprimer en utilisant son ID
        $contact = $this->contactDAO->getById($id);

        if (!$contact) {
            // Le contact n'a pas été trouvé, vous pouvez rediriger ou afficher un message d'erreur
            echo "Le contact n'a pas été trouvé.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Supprimer le contact en appelant la méthode du modèle (ContactDAO)
            if ($this->contactDAO->deleteById($id)) {
                // Rediriger vers la page d'accueil après la suppression
                header('Location:index.php?page=contacts');
                exit();
            } else {
                // Gérer les erreurs de suppression du contact
                echo "Erreur lors de la suppression du contact.";
            }
        }

        // Inclure la vue pour afficher la confirmation de suppression du contact
        include('views/contacts/delete_contact.php');
    }
}
