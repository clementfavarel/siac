<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Profil | Mapollon</title>
    <?php include('../../../assets/includes/head.php'); ?>

    <style>
        body {
            background-color: #333;
        }
    </style>
</head>

<body>

    <?php include('../../../assets/includes/tabbar.php'); ?>
</body>

</html>