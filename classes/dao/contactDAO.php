<?php

class ContactDAO
{
    private $connexion;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }

    // Insertion d'un nouveau contact dans la base de données
    public function create(ContactModel $contact)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO contacts (nom, prenom, email, telephone, id_licencie) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTelephone(), $contact->getIdLicencie()]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }

    // Récupération d'un contact par son ID
    public function getById($id)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM contacts WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) return new ContactModel($row['id'], $row['nom'], $row['prenom'], $row['email'], $row['telephone'], $row['id_licencie']);
            return null; // Aucun contact trouvé avec cet ID
        } catch (PDOException $e) {
            // Gestion des erreurs
            return null;
        }
    }

    // Récupération de la liste des contacts
    public function getAll()
    {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contacts");
            $contacts = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new ContactModel($row['id'], $row['nom'], $row['prenom'], $row['email'], $row['telephone'], $row['id_licencie']);
            }

            return $contacts;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return [];
        }
    }

    // Mise à jour d'un contact
    public function update(ContactModel $contact)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE contacts SET nom = ?, prenom = ?, email = ?, telephone = ?, id_licencie = ? WHERE id = ?");
            $stmt->execute([$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getTelephone(), $contact->getIdLicencie(), $contact->getId()]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }

    // Suppression d'un contact par son ID
    public function deleteById($id)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM contacts WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }
}
