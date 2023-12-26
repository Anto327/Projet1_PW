<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Educateurs</title>
    <link rel="stylesheet" href="../../assets/styles.css">
</head>

<body>
    <h1>Liste des Educateurs</h1>
    <a href="index.php?page=educateurs&action=add">Ajouter un éducateur</a>

    <?php if (!empty($educateurs)) : ?>
        <table>
            <thead>
                <tr>
                    <th>No licence</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Catégorie</th>
                    <th>Email</th>
                    <th>Accès admin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($educateurs as $educateur) : ?>
                    <tr>
                        <td><?= $educateur->getNumLicence() ?></td>
                        <td><?= $educateur->getNom() ?></td>
                        <td><?= $educateur->getPrenom() ?></td>
                        <td><?= $educateur->getIdCategorie() ?></td>
                        <td><?= $educateur->getEmail() ?></td>
                        <td><?= $educateur->isAdmin() ? "Oui" : "Non" ?></td>
                        <td>
                            <a href="index.php?page=educateurs&action=show&id=<?= $educateur->getId(); ?>">Voir</a>
                            <a href="index.php?page=educateurs&action=edit&id=<?= $educateur->getId(); ?>">Modifier</a>
                            <a href="index.php?page=educateurs&action=delete&id=<?= $educateur->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun éducateur trouvé.</p>
    <?php endif; ?>
</body>

</html>