<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des catégories</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <h1>Liste des catégories</h1>
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
                        <td><?php echo $categorie->getNom(); ?></td>
                        <td><?php echo $categorie->getCode(); ?></td>
                        <td>
                            <a href="index.php?page=categories&action=show&id=<?php echo $categorie->getId(); ?>">Voir</a>
                            <a href="index.php?page=categories&action=edit&id=<?php echo $categorie->getId(); ?>">Modifier</a>
                            <a href="index.php?page=categories&action=delete&id=<?php echo $categorie->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun catégorie trouvée.</p>
    <?php endif; ?>
</body>

</html>