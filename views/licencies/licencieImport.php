<?php

require_once('../controllers/LicencieExport.php');
require_once('../config/connexion.php');
require_once('../dao/LicencieDAO.php');

$connexion = new Connexion(); // Initialisez votre connexion à la base de données
$licencieDAO = new LicencieDAO($connexion);
$licencieExporterPDF = new LicencieExport($licencieDAO);

$filename = 'licencies_export.pdf';
$licencieExport->exportToPDF($filename);

// Redirigez l'utilisateur vers le fichier PDF généré
header('Location: ' . $filename);
exit();
