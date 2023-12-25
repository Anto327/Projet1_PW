<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails du licencié</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h1>Détails du licencié</h1>
    <a href="index.php?page=licencies">Retour à la liste des licencies</a>

    <?php if ($licencie) : ?>
        <p><strong>No licence :</strong> <?php echo $licencie->getNumLicence(); ?></p>
        <p><strong>Nom :</strong> <?php echo $licencie->getNom(); ?></p>
        <p><strong>Prénom :</strong> <?php echo $licencie->getPrenom(); ?></p>
        <p><strong>Catégorie :</strong> <?php echo $licencie->getIdCategorie(); ?></p>
    <?php else : ?>
        <p>Le licencie n'a pas été trouvé.</p>
    <?php endif; ?>
</body>

</html>