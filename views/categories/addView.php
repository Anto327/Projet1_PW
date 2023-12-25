<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une catégorie</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <h1>Ajouter une catégorie</h1>
    <a href="index.php?page=categories">Retour à la liste des catégories</a>

    <form action="index.php?page=categories&action=create" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="code">Prénom :</label>
        <input type="text" id="code" name="code" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>
</body>

</html>