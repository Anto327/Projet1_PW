<?php

// Classe de connexion à la base de données en utilisant PDO
class Connexion
{
    // Informations de connexion à la base de données
    private string $host = "localhost"; // L'hôte de la base de données (généralement "localhost")
    private string $database = "projetpw1"; // Le nom de la base de données
    private string $username = "root"; // Le nom d'utilisateur MySQL
    private string $password = ""; // Le mot de passe MySQL
    // Objet de connexion
    public $pdo;

    public function __construct()
    {
        // Connexion à la base de données
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            // Définir le mode d'erreur PDO à exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En cas d'erreur de connexion, afficher un message d'erreur
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}
