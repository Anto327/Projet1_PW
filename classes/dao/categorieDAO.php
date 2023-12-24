<?php

class CategorieDAO
{
    private $connexion;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }

    // Insertion d'une nouvelle catégorie dans la base de données
    public function create(CategorieModel $categorie)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO categories (nom, code) VALUES (?, ?)");
            $stmt->execute([$categorie->getNom(), $categorie->getCode()]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }

    // Récupération d'une categorie par son ID
    public function getById($id)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM categories WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) return new CategorieModel($row['id'], $row['nom'], $row['code']);
            return null; // Aucun categorie trouvée avec cet ID
        } catch (PDOException $e) {
            // Gestion des erreurs
            return null;
        }
    }

    // Récupération de la liste des categories
    public function getAll()
    {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM categories");
            $categories = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = new CategorieModel($row['id'], $row['nom'], $row['code']);
            }

            return $categories;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return [];
        }
    }

    // Mise à jour d'une categorie
    public function update(CategorieModel $categorie)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE categories SET nom = ?, code = ? WHERE id = ?");
            $stmt->execute([$categorie->getNom(), $categorie->getCode(), $categorie->getId()]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }

    // Suppression d'une categorie par son ID
    public function deleteById($id)
    {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM categories WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // Gestion des erreurs
            return false;
        }
    }
}
