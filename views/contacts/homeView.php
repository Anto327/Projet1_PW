<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <link rel="stylesheet" href="/assets/styles.css">
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
                        <td><?= $contact->getNom(); ?></td>
                        <td><?= $contact->getPrenom(); ?></td>
                        <td><?= $contact->getEmail(); ?></td>
                        <td><?= $contact->getTelephone(); ?></td>
                        <td>
                            <a href="index.php?page=contacts&action=show&id=<?= $contact->getId(); ?>">Voir</a>
                            <a href="index.php?page=contacts&action=edit&id=<?= $contact->getId(); ?>">Modifier</a>
                            <a href="index.php?page=contacts&action=delete&id=<?= $contact->getId(); ?>">Supprimer</a>
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