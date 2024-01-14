<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter une Catégorie</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <h1>Ajouter une Catégorie</h1>
    <a href="index.php?page=categories">Retour à la liste des catégories</a>

    <form action="index.php?page=categories&action=create" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="code">Code :</label>
        <input type="text" id="code" name="code" required><br>

        <button type="submit">Ajouter</button>
    </form>
</body>

</html>