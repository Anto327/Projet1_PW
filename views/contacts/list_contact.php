<?php

// Exception handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Imports
require_once "../../config/Connexion.php";
require_once "../../classes/dao/ContactDAO.php";
require_once "../../classes/models/ContactModel.php";
// Data
$contactDAO = new ContactDAO(new Connexion());
$contacts =  $contactDAO->getAll();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <h1>Liste des Contacts</h1>
    <a href="AddContactController.php">Ajouter un contact</a>

    <?php if (count($contacts) > 0) : ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td><?php echo $contact->getNom(); ?></td>
                        <td><?php echo $contact->getPrenom(); ?></td>
                        <td><?php echo $contact->getEmail(); ?></td>
                        <td><?php echo $contact->getTelephone(); ?></td>
                        <td>
                            <a href="ViewContactController.php?id=<?php echo $contact->getId(); ?>">Voir</a>
                            <a href="EditContactController.php?id=<?php echo $contact->getId(); ?>">Modifier</a>
                            <a href="DeleteContactController.php?id=<?php echo $contact->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun contact trouvé.</p>
    <?php endif; ?>
</body>

</html>