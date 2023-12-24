<?php

// Classe représentant les licenciés de notre base de données
class LicencieModel
{
    private $id;
    private $num_licence;
    private $nom;
    private $prenom;
    private $id_categorie;
    private $id_contact;

    public function __construct($id, $num_licence, $nom, $prenom, $id_categorie, $id_contact)
    {
        $this->id = $id;
        $this->num_licence = $num_licence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_categorie = $id_categorie;
        $this->id_contact = $id_contact;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNumLicence()
    {
        return $this->num_licence;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    public function getIdContact()
    {
        return $this->id_contact;
    }

    // Setters
    public function setNumLicence($num_licence)
    {
        $this->num_licence = $num_licence;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    public function setIdContact($id_contact)
    {
        $this->id_contact = $id_contact;
    }
}
