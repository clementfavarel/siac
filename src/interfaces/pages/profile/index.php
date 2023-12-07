<?php
include('../../../database/config/config.php');
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php");
    exit();
}

$sql = 'SELECT * FROM utilisateur WHERE id = ?';
$stmt = $db->prepare($sql);
$stmt->bindValue(1, $_SESSION['user']);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Profil | Mapollon</title>
    <?php include('../../../assets/includes/head.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../assets/css/global.css"/>
    <link rel="stylesheet" href="./profile.css"/>
</head>

<body>
<?php include('../../../assets/includes/tabbar.php'); ?>

<div class="user-banner">
    <h3>Bonjour,</h3>
    <h2><?php echo $result['nom'] . ' ' . $result['prenom'] . ' ! '; ?></h2>
</div>

<div class="user-infos-section">
    <div class="infos-title">
        <h1>Vos informations</h1>
        <p>Appuyez sur une case pour modifier </p>
    </div>
</div>

<div class="user-infos">
    <div class="inputs">
        <input class="first-input" type="text" placeholder="<?php echo $result['nom'] ?>" readonly>
    </div>

    <div class="inputs">
        <input type="text" placeholder="<?php echo $result['prenom'] ?>" readonly>
    </div>

    <div class="inputs">
        <input type="text" placeholder="<?php echo $result['email'] ?>" readonly>
    </div>

    <div class="inputs">
        <input type="text" placeholder="Nouveau mot de passe">
    </div>
</div>

<div class="disconnect">
    <button><i class="bi bi-power"></i>Se déconnecter</button>
</div>

</body>

</html>