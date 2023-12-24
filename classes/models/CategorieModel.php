<?php

// Classe représentant les catégories de notre base de données
class CategorieModel
{
    private $id;
    private $nom;
    private $code;

    public function __construct($id, $nom, $code)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->code = $code;
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

    public function getCode()
    {
        return $this->code;
    }

    // Setters
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }
}
