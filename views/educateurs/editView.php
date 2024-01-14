<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un licencié</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <h1>Modifier un éducateur</h1>
    <a href="index.php?page=educateurs">Retour à la liste des éducateurs</a>

    <?php if ($educateur) : ?>
        <form action="index.php?page=educateurs&action=update&id=<?= $educateur->getId() ?>" method="post">
            <label for="num_licence">Numéro de licence :</label>
            <input type="number" id="num_licence" name="num_licence" value="<?= $educateur->getNumLicence() ?>" required><br>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $educateur->getNom() ?>" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= $educateur->getPrenom() ?>" required><br>

            <label for="id_categorie">Catégorie :</label>
            <select id="id_categorie" name="id_categorie" required>
                <option value="">-- Choisir une catégorie --</option>
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?= $categorie->getId(); ?>" <?php if ($categorie->getId() == $educateur->getIdCategorie()) echo "selected" ?>><?= $categorie->getNom(); ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="email">Email :</label>
            <input type="text" id="email" name="email" value="<?= $educateur->getEmail() ?>" required><br>

            <label for="password">Mot de passe : (seulement si vous voulez changer de mot de passe)</label>
            <input type="password" id="password" name="password"><br>

            <label for="is_admin">Accès admin</label>
            <input type="checkbox" id="is_admin" name="is_admin" <?php if ($educateur->isAdmin()) echo "checked"; ?>><br>

            <button type="submit">Modifier</button>
        </form>
    <?php else : ?>
        <p>Le educateur n'a pas été trouvé.</p>
    <?php endif; ?>

</body>

</html>