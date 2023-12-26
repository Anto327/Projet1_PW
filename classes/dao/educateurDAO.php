<?php

class EducateurDAO
{
    private $connexion;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }

    // Insertion d'un nouvel éducateur dans la base de données
    public function create(EducateurModel $educateur)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencies (num_licence, nom, prenom, id_categorie) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getNumLicence(), $educateur->getNom(), $educateur->getPrenom(), $educateur->getIdCategorie()]);

            $id_licencie = $this->connexion->pdo->lastInsertId();
            // var_dump($id_licencie);
            // $educateur->setIdLicencie($id_licencie);

            $stmt = $this->connexion->pdo->prepare("INSERT INTO educateurs (email, password, is_admin, id_licencie) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getEmail(), $educateur->getPassword(), $educateur->isAdmin(), $id_licencie]);

            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo ($e);
            return false;
        }
    }

    // Récupération d'un éducateur par son ID
    public function getById($id)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT educateurs.id, licencies.num_licence, licencies.nom, licencies.prenom, licencies.id_categorie, educateurs.email, educateurs.password, educateurs.is_admin, educateurs.id_licencie FROM educateurs JOIN licencies ON educateurs.id_licencie = licencies.id WHERE educateurs.id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) return new EducateurModel($row['id'], $row['num_licence'], $row['nom'], $row['prenom'], $row['id_categorie'], $row['email'], $row['password'], $row['is_admin'], $row['id_licencie']);
            return null; // Aucun éducateur trouvé avec cet ID
        } catch (PDOException $e) {
            // Gestion des erreurs
            return null;
        }
    }

    // Récupération de la liste des éducateurs
    public function getAll()
    {
        try {
            $stmt = $this->connexion->pdo->query("SELECT educateurs.id, licencies.num_licence, licencies.nom, licencies.prenom, licencies.id_categorie, educateurs.email, educateurs.password, educateurs.is_admin, educateurs.id_licencie FROM educateurs JOIN licencies ON educateurs.id_licencie = licencies.id");
            $educateurs = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateurs[] = new EducateurModel($row['id'], $row['num_licence'], $row['nom'], $row['prenom'], $row['id_categorie'], $row['email'], $row['password'], $row['is_admin'], $row['id_licencie']);
            }

            return $educateurs;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return [];
        }
    }

    // Mise à jour d'un éducateur
    public function update(EducateurModel $educateur)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE licencies SET num_licence = ?, nom = ?, prenom = ?, id_categorie = ? WHERE id = ?");
            $stmt->execute([$educateur->getNumLicence(), $educateur->getNom(), $educateur->getPrenom(), $educateur->getIdCategorie(), $educateur->getIdLicencie()]);

            $stmt = $this->connexion->pdo->prepare("UPDATE educateurs SET email = ?, password = ?, is_admin = ? WHERE id = ?");
            $stmt->execute([$educateur->getEmail(), $educateur->getPassword(), $educateur->isAdmin(), $educateur->getId()]);

            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            echo $e;
            return false;
        }
    }

    // Suppression d'un éducateur par son ID
    public function deleteById($id)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM educateurs WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }
}
