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
    <title>Likes | Mapollon</title>
    <?php include('../../../assets/includes/head.php'); ?>
    <link rel="stylesheet" href="../../../assets/css/global.css" />
    <link rel="stylesheet" href="./likes.css" />
</head>

<body>

    <?php include('../../../assets/includes/tabbar.php'); ?>
</body>

</html>