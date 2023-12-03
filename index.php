<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: src/interfaces/pages/map/");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Bienvenue sur Mapollon !</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="180x180" href="src/assets/icons/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="src/assets/icons/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="src/assets/icons/favicon-16x16.png"/>
    <link rel="manifest" href="src/assets/icons/site.webmanifest"/>
    <link rel="mask-icon" href="src/assets/icons/safari-pinned-tab.svg" color="#2b5797"/>
    <link rel="shortcut icon" href="src/assets/icons/favicon.ico"/>
    <meta name="msapplication-TileColor" content="#2b5797"/>
    <meta name="msapplication-config" content="src/assets/icons/browserconfig.xml"/>
    <meta name="theme-color" content="#ffffff"/>
    <link rel="stylesheet" href="src/assets/css/global.css"/>
    <link rel="stylesheet" href="src/assets/css/index.css"/>
</head>

<body class="container">
<div class="content">
    <div class="column">
        <img src="src/assets/img/logo-siac.svg" alt="SIAC 2024" class="logo-siac"/>
        <img src="src/assets/img/logo-mapollon.svg" alt="MAPOLLON"/>
    </div>
    <div class="text-landing-page">
        <h1>Visitez le siac avec Mapollon.</h1>
        <p>Arpentez le salon à travers un parcours sur les artistes engagés, avec de la Réalité Augmentée, des
            interviews personnalisées, des ambiances sonores et plus encore !</p>
    </div>
    <div class="column">
        <a href="src/interfaces/pages/auth/login.php" class="btn primary">Se connecter</a>
        <a href="src/interfaces/pages/auth/register.php" class="btn secondary">Créer un compte</a>
    </div>
</div>
</body>

</html>