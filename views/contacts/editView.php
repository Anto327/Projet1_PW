<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Modifier un Contact</title>
    <link rel="stylesheet" href="../assets/styles.css">
</head>

<body>
    <h1>Modifier un Contact</h1>
    <a href="index.php?page=contacts">Retour à la liste des contacts</a>

    <?php if ($contact) : ?>
        <form action="index.php?page=contacts&action=update&id=<?= $contact->getId(); ?>" method="post">
            <label for="id_licencie">Licencié :</label>
            <select id="id_licencie" name="id_licencie" required>
                <option value="">-- Choisir un licencié --</option>
                <?php foreach ($licencies as $licencie) : ?>
                    <option value="<?= $licencie->getId() ?>" <?php if ($licencie->getId() == $contact->getIdLicencie()) echo "selected"; ?> onclick="fillNameInputs('<?= $licencie->getNom() ?>', '<?= $licencie->getPrenom() ?>');">
                        <?= $licencie->getNomComplet() ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= $contact->getNom() ?>" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= $contact->getPrenom() ?>" required><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?= $contact->getEmail() ?>" required><br>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?= $contact->getTelephone() ?>" required><br>

            <button type="submit">Modifier</button>
        </form>
    <?php else : ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>
    <!-- Javascript -->
    <script src="../../assets/script.js"></script>
</body>

</html>