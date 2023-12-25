<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier une catégorie</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h1>Modifier une catégorie</h1>
    <a href="index.php?page=categories">Retour à la liste des catégories</a>

    <?php if ($categorie) : ?>
        <form action="index.php?page=categories&action=update&id=<?php echo $categorie->getId(); ?>" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $categorie->getNom(); ?>" required><br>

            <label for="code">Code :</label>
            <input type="text" id="code" name="code" value="<?php echo $categorie->getCode(); ?>" required><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else : ?>
        <p>Le categorie n'a pas été trouvée.</p>
    <?php endif; ?>

</body>

</html>