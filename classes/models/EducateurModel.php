<?php

// Classe représentant les éducateurs de notre base de données
class EducateurModel extends LicencieModel
{
    private $email;
    private $password;
    private $is_admin;

    public function __construct($id, $num_licence, $nom, $prenom, $id_categorie, $id_contact, $email, $password, $is_admin)
    {
        parent::__construct($id, $num_licence, $nom, $prenom, $id_categorie, $id_contact);
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }

    // Getters
    public function getEmail()
    {
        return $this->email;
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    // Setters
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setIsAdmin($is_admin)
    {
        $this->is_admin = $is_admin;
    }
}
