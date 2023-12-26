<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Supprimer un Contact</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <h1>Supprimer un Contact</h1>
    <a href="index.php?page=contacts">Retour à la liste des contacts</a>

    <?php if ($contact) : ?>
        <p>Voulez-vous vraiment supprimer le contact <strong>"<?= $contact->getNomComplet(); ?>"</strong> ?</p>
        <form action="index.php?page=contacts&action=delete&id=<?= $contact->getId(); ?>" method="post">
            <button type="submit">Oui, Supprimer</button>
        </form>
    <?php else : ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

</body>

</html>