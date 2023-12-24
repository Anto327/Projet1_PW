<?php

// Exception handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Imports
require_once "./config/Connexion.php";
require_once "./classes/dao/ContactDAO.php";
require_once "./classes/models/ContactModel.php";
// Data
$contactDAO = new ContactDAO(new Connexion());
$contacts =  $contactDAO->getAll();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Licenciés</title>
</head>

<body>
    <h1>Accueil</h1>
    <ul>
        <li><a href="CategorieController.php">Les catégories</a></li>
        <li><a href="ContactController.php">Les contacts</a></li>
        <li><a href="LicencieController.php">Les licenciés</a></li>
        <li><a href="EdacuteurController.php">Les éducateurs</a></li>
    </ul>
</body>

</html>