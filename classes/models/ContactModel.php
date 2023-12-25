<?php

// Classe représentant les contacts de notre base de données
class ContactModel
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $id_licencie;

    public function __construct($id, $nom, $prenom, $email, $telephone, $id_licencie)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->id_licencie = $id_licencie;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNomComplet()
    {
        return "$this->nom $this->prenom";
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getIdLicencie()
    {
        return $this->id_licencie;
    }

    // Setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setIdLicencie($id_licencie)
    {
        $this->$id_licencie = $id_licencie;
    }
}
