<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un licencié</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <h1>Ajouter un licencié</h1>
    <a href="index.php?page=licencies">Retour à la liste des licenciés</a>

    <form action="index.php?page=licencies&action=create" method="post">
        <label for="num_licence">Numéro de licence :</label>
        <input type="text" id="num_licence" name="num_licence" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="id_categorie">Catégorie :</label>
        <select name="id_categorie" id="id_categorie" required>
            <option value="">-- Choisir --</option>
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?php echo $categorie->getId(); ?>"><?php echo $categorie->getNom(); ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="action" value="Ajouter">
    </form>
</body>

</html>