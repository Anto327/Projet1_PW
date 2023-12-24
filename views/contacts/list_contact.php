<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <h1>Liste des Contacts</h1>
    <a href="index.php?page=contacts&action=add">Ajouter un contact</a>

    <?php if (!empty($contacts)) : ?>
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
                            <a href="index.php?page=contacts&action=show&id=<?php echo $contact->getId(); ?>">Voir</a>
                            <a href="index.php?page=contacts&action=edit&id=<?php echo $contact->getId(); ?>">Modifier</a>
                            <a href="index.php?page=contacts&action=delete&id=<?php echo $contact->getId(); ?>">Supprimer</a>
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