<?php
require_once("./config/connexion.php");
require_once("./classes/models/EducateurModel.php");
require_once("./classes/dao/EducateurDAO.php");
require_once("./controllers/LoginController.php");

$educateurDAO = new EducateurDAO(new Connexion());


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <h1>Page d'administration</h1>

    <form action="index.php?page=login&action=login" method="POST">
        <label>Email</label>
        <input type="email" id="email" name="email" required><br>
        <label> Mot de passe</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="login">Se connecter</button>
    </form>
</body>

</html>