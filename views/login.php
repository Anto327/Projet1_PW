<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/styles.css">
</head>

<body>
    <h1>Page d'administration</h1>

    <form action="index.php?page=auth&action=login" method="POST">
        <label>Email</label>
        <input type="email" id="email" name="email" required><br>

        <label> Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
    </form>
</body>

</html>