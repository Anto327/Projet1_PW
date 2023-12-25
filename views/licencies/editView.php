<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un Contact</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <h1>Modifier un Contact</h1>
    <a href="index.php?page=contacts">Retour à la liste des contacts</a>

    <?php if ($contact) : ?>
        <form action="index.php?page=contacts&action=update&id=<?php echo $contact->getId(); ?>" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $contact->getNom(); ?>" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $contact->getPrenom(); ?>" required><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo $contact->getEmail(); ?>" required><br>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo $contact->getTelephone(); ?>" required><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else : ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

</body>

</html>