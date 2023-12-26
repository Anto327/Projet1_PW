<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Supprimer un licencié</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <h1>Supprimer un licencié</h1>
    <a href="index.php?page=licencies">Retour à la liste des licencies</a>

    <?php if ($licencie) : ?>
        <p>Voulez-vous vraiment supprimer le licencié <strong>"<?= $licencie->getNomComplet(); ?>"</strong> ?</p>
        <form action="index.php?page=licencies&action=delete&id=<?= $licencie->getId(); ?>" method="post">
            <button type="submit">Oui, Supprimer</button>
        </form>
    <?php else : ?>
        <p>Le licencie n'a pas été trouvé.</p>
    <?php endif; ?>

</body>

</html>