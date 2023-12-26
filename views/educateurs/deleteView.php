<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Supprimer un Educateur</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <h1>Supprimer un Educateur</h1>
    <a href="index.php?page=educateurs">Retour à la liste des éducateurs</a>

    <?php if ($educateur) : ?>
        <p>Voulez-vous vraiment supprimer l'éducateur <strong>"<?= $educateur->getNomComplet() ?>"</strong> ?</p>
        <form action="index.php?page=educateurs&action=delete&id=<?= $educateur->getId(); ?>" method="post">
            <button type="submit">Oui, Supprimer</button>
        </form>
    <?php else : ?>
        <p>L'éducateur n'a pas été trouvé.</p>
    <?php endif; ?>

</body>

</html>