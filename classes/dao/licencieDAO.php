<?php

class LicencieDAO
{
    private $connexion;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }

    // Insertion d'un nouveau licencié dans la base de données
    public function create(LicencieModel $licencie)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencies (num_licence, nom, prenom, id_categorie, id_contact) VALUES (?, ?, ?, ?)");
            $stmt->execute([$licencie->getNumLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getIdCategorie(), $licencie->getIdContact()]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }

    // Récupération d'un licencié par son ID
    public function getById($id)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencies WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) return new LicencieModel($row['id'], $row['num_licence'], $row['nom'], $row['prenom'], $row['id_categorie'], $row['id_contact']);
            return null; // Aucun licencié trouvé avec cet ID
        } catch (PDOException $e) {
            // Gestion des erreurs
            return null;
        }
    }

    // Récupération de la liste des licenciés
    public function getAll()
    {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencies");
            $licencies = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencies[] = new LicencieModel($row['id'], $row['num_licence'], $row['nom'], $row['prenom'], $row['id_categorie'], $row['id_contact']);
            }

            return $licencies;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return [];
        }
    }

    // Mise à jour d'un licencié
    public function update(LicencieModel $licencie)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE licencies SET num_licence = ?, nom = ?, prenom = ?, id_categorie = ?, id_contact = ? WHERE id = ?");
            $stmt->execute([$licencie->getNumLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getIdCategorie(), $licencie->getIdContact(), $licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }

    // Suppression d'un licencié par son ID
    public function deleteById($id)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencies WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }
}
