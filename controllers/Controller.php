<?php

abstract class Controller
{
    protected $categorieDAO;
    protected $contactDAO;
    protected $licencieDAO;
    protected $educateurDAO;

    public function __construct(CategorieDAO $categorieDAO, ContactDAO $contactDAO, LicencieDAO $licencieDAO, EducateurDAO $educateurDAO)
    {
        $this->categorieDAO = $categorieDAO;
        $this->contactDAO = $contactDAO;
        $this->licencieDAO = $licencieDAO;
        $this->educateurDAO = $educateurDAO;
    }

    // Méthodes pour afficher des vues
    public abstract function index();
    public abstract function add();
    public abstract function show($id);
    public abstract function edit($id);

    // Méthodes pour effectuer des opérations
    public abstract function create();
    public abstract function update($id);
    public abstract function delete($id);
}
