<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <h1>Ajouter un Contact</h1>
    <a href="index.php?page=contacts">Retour à la liste des contacts</a>

    <form action="index.php?page=contacts&action=create" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" name="telephone" required><br>

        <input type="submit" name="action" value="Ajouter">
    </form>
</body>

</html>