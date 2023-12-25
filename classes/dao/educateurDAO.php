<?php

class EducateurDAO
{
    private $connexion;

    public function __construct(Connexion $connexion)
    {
        $this->connexion = $connexion;
    }
}
