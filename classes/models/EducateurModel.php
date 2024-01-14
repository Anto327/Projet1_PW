<?php

// Classe représentant les éducateurs de notre base de données
class EducateurModel extends LicencieModel
{
    private $email;
    private $password;
    private $is_admin;
    private $id_licencie;

    public function __construct($id, $num_licence, $nom, $prenom, $id_categorie, $email, $password, $is_admin, $id_licencie)
    {
        parent::__construct($id, $num_licence, $nom, $prenom, $id_categorie);
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
        $this->id_licencie = $id_licencie;
    }

    // Getters
    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function getIdLicencie()
    {
        return $this->id_licencie;
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

    public function setIdLicencie($id_licencie)
    {
        $this->$id_licencie = $id_licencie;
    }
}
