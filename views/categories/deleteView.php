<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Supprimer une catégorie</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h1>Supprimer une catégorie</h1>
    <a href="index.php?page=categories">Retour à la liste des catégories</a>

    <?php if ($categorie) : ?>
        <p>Voulez-vous vraiment supprimer la catégorie <strong>"<?php echo $categorie->getNom(); ?>"</strong> ?</p>
        <form action="index.php?page=categories&action=delete&id=<?php echo $categorie->getId(); ?>" method="post">
            <button type="submit">Oui, Supprimer</button>
        </form>
    <?php else : ?>
        <p>Le catégorie n'a pas été trouvée.</p>
    <?php endif; ?>

</body>

</html>