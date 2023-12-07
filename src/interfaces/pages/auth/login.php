<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: ../../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../../../assets/includes/head.php'); ?>
    <title>Connexion | Mapollon</title>
    <link rel="stylesheet" href="../../../assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/auth.css" />
</head>

<body>
    <div class="container">
        <h1>Connexion</h1>
        <form action="controllers/login.contr.php" method="post">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" />
            </div>
            <div class="input-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" />
            </div>
            <input class="btn primary center" type="submit" value="Se connecter" />
        </form>
    </div>
</body>

</html>