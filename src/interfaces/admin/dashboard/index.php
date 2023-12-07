<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
}
include('../../../database/config/config.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../../../assets/includes/head.php'); ?>
    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="../../../assets/css/global.css" />
    <link rel="stylesheet" href="./index.css" />
</head>

<body>
    <?php include('../../../assets/includes/sidebar.php'); ?>
    <div class="dashboard">
        <h1 class="title">Dashboard</h1>
        <div class="flex">
            <div class="col">
                <div class="box">
                    <h2>Utilisateurs</h2>
                    <div class="data">
                        <img class="illustration" src="../../../assets/img/users-dark.svg" alt="Users" />
                        <?php
                        $sql = "SELECT * FROM utilisateur";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        echo "<h3>$count</h3>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="box">
                    <h2>Utilisateurs</h2>
                    <div class="data">
                        <img class="illustration" src="../../../assets/img/users-dark.svg" alt="Users" />
                        <?php
                        $sql = "SELECT * FROM utilisateur";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        // fetch users
                        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo "<h3>$count</h3>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="box">
                    <h2>Utilisateurs</h2>
                    <div class="data">
                        <img class="illustration" src="../../../assets/img/pen-tool-dark.svg" alt="Users" />
                        <?php
                        $sql = "SELECT * FROM utilisateur";
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        echo "<h3>$count</h3>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>