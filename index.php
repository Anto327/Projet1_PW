<?php

// Session
session_start();
ob_start();


// Imports
require_once("./config/Connexion.php");

// Modèles & DAOs
require_once("./classes/models/CategorieModel.php");
require_once("./classes/dao/CategorieDAO.php");

require_once("./classes/models/ContactModel.php");
require_once("./classes/dao/ContactDAO.php");

require_once("./classes/models/LicencieModel.php");
require_once("./classes/dao/LicencieDAO.php");

require_once("./classes/models/EducateurModel.php");
require_once("./classes/dao/EducateurDAO.php");

// Controllers
require_once("./controllers/Controller.php");

// Classes
$connexion = new Connexion();
$categorieDAO = new CategorieDAO($connexion);
$contactDAO = new ContactDAO($connexion);
$licencieDAO = new LicencieDAO($connexion);
$educateurDAO = new EducateurDAO($connexion);

// Routage
if (!isset($_SESSION['valid'])) {
    $page = 'auth'; // Redirection des utilisateurs non connectés sur la page de connexion
} else if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home'; // Page par défaut
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index'; // Action par défaut
}

// Définition des controlleurs
$controllers = [
    'auth' => 'AuthController',
    'home' => 'HomeController',
    'categories' => 'CategorieController',
    'contacts' => 'ContactController',
    'educateurs' => 'EducateurController',
    'licencies' => 'LicencieController'
];

// Vérifier si le controleur demandé existe
if (array_key_exists($page, $controllers)) {
    $controllerName = $controllers[$page];

    // Inclure le fichier du controleur
    require_once("./controllers/$controllerName.php");

    // Instancier le controleur
    $controller = new $controllerName($categorieDAO, $contactDAO, $licencieDAO, $educateurDAO);

    // Exécuter la méthode par défaut du controleur (par exemple, index() ou home())
    if ($page == 'auth') {
        $controller->$action(isset($_GET['id']) ? $_GET['id'] : null);
        exit();
    }
}

?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Club Sportif</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
    <link rel="stylesheet" href="./assets/styles.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <?php include './views/components/sidebar.php'; ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php include './views/components/header.php'; ?>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <!-- Subviews content -->
                        <?php
                        if (array_key_exists($page, $controllers)) {
                            $controller->$action(isset($_GET['id']) ? $_GET['id'] : null);
                        } else {
                            echo "<h1>Page non trouvée</h1>";
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="./assets/js/dashboard.js"></script>
    <script>
        function fillNameInputs(nom, prenom) {
            console.log(nom);
            const lastname = document.getElementById("nom");
            const firstname = document.getElementById("prenom");
            lastname.value = nom;
            firstname.value = prenom;
        }
    </script>
</body>

</html>