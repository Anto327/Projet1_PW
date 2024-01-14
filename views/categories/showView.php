<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails de la Catégorie</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <h1>Détails de la Catégorie</h1>
    <a href="index.php?page=categories">Retour à la liste des categories</a>

    <?php if ($categorie) : ?>
        <p><strong>Nom :</strong> <?= $categorie->getNom(); ?></p>
        <p><strong>Code :</strong> <?= $categorie->getCode(); ?></p>
    <?php else : ?>
        <p>Le catégorie n'a pas été trouvée.</p>
    <?php endif; ?>
</body>

</html>