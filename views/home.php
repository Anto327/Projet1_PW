<?php

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
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h1>Accueil</h1>
    <ul>
        <li><a href="index.php?page=categories">Les catégories</a></li>
        <li><a href="index.php?page=contacts">Les contacts</a></li>
        <li><a href="index.php?page=licencies">Les licenciés</a></li>
        <li><a href="index.php?page=educateurs">Les éducateurs</a></li>
    </ul>
</body>

</html>