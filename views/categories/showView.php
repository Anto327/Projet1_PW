<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Détails de la catégorie</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h1>Détails de la catégorie</h1>
    <a href="index.php?page=categories">Retour à la liste des categories</a>

    <?php if ($categorie) : ?>
        <p><strong>Nom :</strong> <?php echo $categorie->getNom(); ?></p>
        <p><strong>Code :</strong> <?php echo $categorie->getCode(); ?></p>
    <?php else : ?>
        <p>Le catégorie n'a pas été trouvée.</p>
    <?php endif; ?>
</body>

</html>