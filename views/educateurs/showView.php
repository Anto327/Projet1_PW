<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails de l'Educateur</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <h1>Détails de l'Educateur</h1>
    <a href="index.php?page=educateurs">Retour à la liste des éducateurs</a>

    <?php if ($educateur) : ?>
        <p><strong>No licence :</strong> <?= $educateur->getNumLicence() ?></p>
        <p><strong>Nom :</strong> <?= $educateur->getNom() ?></p>
        <p><strong>Prénom :</strong> <?= $educateur->getPrenom() ?></p>
        <p><strong>Catégorie :</strong> <?= $educateur->getIdCategorie() ?></p>
        <p><strong>Email :</strong> <?= $educateur->getEmail() ?></p>
        <p><strong>Accès admin :</strong> <?= $educateur->isAdmin() ? 'Oui' : 'Non' ?></p>
    <?php else : ?>
        <p>L'éducateur n'a pas été trouvé.</p>
    <?php endif ?>
</body>

</html>