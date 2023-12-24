<?php

class HomeController
{
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO)
    {
        $this->contactDAO = $contactDAO;
    }

    public function index()
    {
        include('./views/home.php');
    }
}
