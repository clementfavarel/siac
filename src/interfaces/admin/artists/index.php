<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
}
include_once('../../../database/config/config.php');

$sql = "SELECT * FROM artiste";
$stmt = $db->prepare($sql);
$stmt->execute();
$artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../../../assets/includes/head.php'); ?>
    <title>Artistes | Admin</title>
    <link rel="stylesheet" href="../../../assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/index.css" />
</head>

<body>
    <?php include('../../../assets/includes/sidebar.php'); ?>

    <div class="container">
        <div class="row">
            <h1>Artistes</h1>
            <a href="./add.php">Ajouter un artiste</a>
        </div>
        <!-- display artists info in a table -->
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Tél</th>
                    <th>Web</th>
                    <th>Fb</th>
                    <th>Insta</th>
                    <th>Adresse</th>
                    <th>Code Postal</th>
                    <th>Ville</th>
                    <th>Domaine</th>
                    <th>Présentation</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Interview</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artists as $artist) : ?>
                    <tr>
                        <td><?= $artist['id'] ?></td>
                        <td><?= $artist['nom'] ?></td>
                        <td><?= $artist['prenom'] ?></td>
                        <td><?= $artist['pseudo'] ?></td>
                        <td><?= $artist['email'] ?></td>
                        <td><?= $artist['telephone'] ?></td>
                        <td><?= $artist['web'] ?></td>
                        <td><?= $artist['facebook'] ?></td>
                        <td><?= $artist['instagram'] ?></td>
                        <td><?= $artist['adresse'] ?></td>
                        <td><?= $artist['code_postal'] ?></td>
                        <td><?= $artist['ville'] ?></td>
                        <td><?= $artist['domaine'] ?></td>
                        <td class="crop"><?= $artist['presentation'] ?></td>
                        <td class="crop"><?= $artist['description'] ?></td>
                        <td><?= $artist['photo_url'] ?></td>
                        <td><?= $artist['interview_url'] ?></td>
                        <td><?= $artist['genre_id'] ?></td>
                        <td>
                            <a href="./modify.php?id=<?= $artist['id'] ?>">Modifier</a>
                            <a href="./delete.php?id=<?= $artist['id'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>