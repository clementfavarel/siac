<?php
session_start();
if (isset($_SESSION['admin'])) {
    header("Location: ./dashboard");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../../assets/includes/head.php'); ?>
    <title>Connexion | Admin</title>
    <link rel="stylesheet" href="../../assets/css/global.css" />
    <link rel="stylesheet" href="../pages/auth/assets/css/auth.css" />
    <link rel="stylesheet" href="./index.css" />
</head>

<body>
    <div class="card">
        <h1>Connexion</h1>
        <form action="" method="post">
            <div class="input-group">
                <label for="identifiant">Identifiant</label>
                <input type="text" name="identifiant" id="identifiant" />
            </div>
            <div class="input-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp" />
            </div>
            <input class="btn dark" type="submit" name="submit" value="Connexion" />
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $identifiant = $_POST['identifiant'];
    $mdp = $_POST['mdp'];

    if ($identifiant == "admin" && $mdp == "admin") {
        session_start();
        $_SESSION['admin'] = $identifiant;
        header('Location: ./dashboard');
    } else {
        echo "<script>alert('Identifiant ou mot de passe incorrect')</script>";
    }
}
?>