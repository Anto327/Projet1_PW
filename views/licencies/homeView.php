<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des licenciés</title>
    <link rel="stylesheet" href="/assets/styles.css">
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
                        <td>
                            <?= $licencie->getNumLicence(); ?>
                        </td>
                        <td>
                            <?= $licencie->getNom(); ?>
                        </td>
                        <td>
                            <?= $licencie->getPrenom(); ?>
                        </td>
                        <td>
                            <?= $licencie->getIdCategorie(); ?>
                        </td>
                        <td>
                            <a href="index.php?page=licencies&action=show&id=<?= $licencie->getId(); ?>">Voir</a>
                            <a href="index.php?page=licencies&action=edit&id=<?= $licencie->getId(); ?>">Modifier</a>
                            <a href="index.php?page=licencies&action=delete&id=<?= $licencie->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="views/export_pdf.php" target="_blank">Export en PDF</a>
    <?php else : ?>
        <p>Aucun licencie trouvé.</p>
    <?php endif; ?>
</body>

</html>