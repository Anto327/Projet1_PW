<?php

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
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'login'; // Page par défaut
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index'; // Action par défaut
}

// Définition des controlleurs
$controllers = [
    'home' => 'HomeController',
    'categories' => 'CategorieController',
    'contacts' => 'ContactController',
    'educateurs' => 'EducateurController',
    'licencies' => 'LicencieController',
    'login' => 'LoginController'
];

// Vérifier si le controleur demandé existe
if (array_key_exists($page, $controllers)) {
    $controllerName = $controllers[$page];
    // Inclure le fichier du controleur
    require_once("./controllers/$controllerName.php");
    echo "<a href='index.php?page=home'>Accueil</a><br>";
    echo "Vous appelez ce controller : $controllerName";
    // Instancier le controleur
    if ($controllerName === 'LoginController') {
        // Instancier le controleur LoginController avec EducateurDAO
        $controller = new $controllerName($educateurDAO);
    } else {
        $controller = new $controllerName($categorieDAO, $contactDAO, $licencieDAO, $educateurDAO);
    }
    // Exécuter la méthode par défaut du controleur (par exemple, index() ou home())
    $controller->$action(isset($_GET['id']) ? $_GET['id'] : null); // Vous pouvez ajuster la méthode par défaut selon votre convention
    // c'est l'interet de action qui permet d'appeler une méthode particuliere d'un controller si il en possede plusieurs
    // ici isset($_GET['id'])?$_GET['id']:null est une ternaire(un if else condensé) pour passer la variable à la fonction si elle existe
} else {
    // Page non trouvée, vous redirigerez vers une page d'erreur 404
    echo "Page non trouvée";
}
