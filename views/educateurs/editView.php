<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un licencié</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <h1>Modifier un licencié</h1>
    <a href="index.php?page=licencies">Retour à la liste des licencies</a>

    <?php if ($licencie) : ?>
        <form action="index.php?page=licencies&action=update&id=<?= $licencie->getId(); ?>" method="post">
            <label for="num_licence">Numéro de licence :</label>
            <input type="number" id="num_licence" name="num_licence" value="<?= $licencie->getNumLicence(); ?>" required><br>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $licencie->getNom(); ?>" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= $licencie->getPrenom(); ?>" required><br>

            <label for="id_categorie">Catégorie :</label>
            <select id="id_categorie" name="id_categorie" required>
                <option value="">-- Choisir une catégorie --</option>
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?= $categorie->getId(); ?>" <?php if ($categorie->getId() == $licencie->getIdCategorie()) echo "selected"; ?>>
                        <?= $categorie->getNom(); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Modifier</button>
        </form>
    <?php else : ?>
        <p>Le licencie n'a pas été trouvé.</p>
    <?php endif; ?>

</body>

</html>