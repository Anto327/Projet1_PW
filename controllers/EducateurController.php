<?php

class EducateurController extends Controller
{
    public function index()
    {
        $educateurs =  $this->educateurDAO->getAll();
        include('./views/educateurs/homeView.php');
    }

    public function add()
    {
        $categories =  $this->categorieDAO->getAll();
        include('./views/educateurs/addView.php');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    // Méthodes pour effectuer des opérations
    public function create()
    {
    }

    public function update($id)
    {
    }

    public function delete($id)
    {
    }
}
