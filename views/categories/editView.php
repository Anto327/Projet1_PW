<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier une Catégorie</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <h1>Modifier une Catégorie</h1>
    <a href="index.php?page=categories">Retour à la liste des catégories</a>

    <?php if ($categorie) : ?>
        <form action="index.php?page=categories&action=update&id=<?= $categorie->getId(); ?>" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $categorie->getNom(); ?>" required><br>

            <label for="code">Code :</label>
            <input type="text" id="code" name="code" value="<?= $categorie->getCode(); ?>" required><br>

            <button type="submit">Modifier</button>
        </form>
    <?php else : ?>
        <p>Le categorie n'a pas été trouvée.</p>
    <?php endif; ?>

</body>

</html>