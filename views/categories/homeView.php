<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des Catégories</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <h1>Liste des Catégories</h1>
    <a href="index.php?page=categories&action=add">Ajouter une catégorie</a>

    <?php if (!empty($categories)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Code</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie) : ?>
                    <tr>
                        <td><?= $categorie->getNom(); ?></td>
                        <td><?= $categorie->getCode(); ?></td>
                        <td>
                            <a href="index.php?page=categories&action=show&id=<?= $categorie->getId(); ?>">Voir</a>
                            <a href="index.php?page=categories&action=edit&id=<?= $categorie->getId(); ?>">Modifier</a>
                            <a href="index.php?page=categories&action=delete&id=<?= $categorie->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucune catégorie trouvée.</p>
    <?php endif; ?>
</body>

</html>