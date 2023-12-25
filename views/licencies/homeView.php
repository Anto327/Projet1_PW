<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des licenciés</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <h1>Liste des licenciés</h1>
    <a href="index.php?page=licencies&action=add">Ajouter un licencié</a>

    <?php if (!empty($licencies)) : ?>
        <table>
            <thead>
                <tr>
                    <th>No licence</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($licencies as $licencie) : ?>
                    <tr>
                        <td><?php echo $licencie->getNumLicence(); ?></td>
                        <td><?php echo $licencie->getNom(); ?></td>
                        <td><?php echo $licencie->getPrenom(); ?></td>
                        <td><?php echo $licencie->getIdCategorie(); ?></td>
                        <td>
                            <a href="index.php?page=licencies&action=show&id=<?php echo $licencie->getId(); ?>">Voir</a>
                            <a href="index.php?page=licencies&action=edit&id=<?php echo $licencie->getId(); ?>">Modifier</a>
                            <a href="index.php?page=licencies&action=delete&id=<?php echo $licencie->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Aucun licencie trouvé.</p>
    <?php endif; ?>
</body>

</html>