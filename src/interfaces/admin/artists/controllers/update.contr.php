<?php

include_once('../../../../database/config/config.php');

$id = $_POST['id'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$genre = $_POST['genre'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$web = $_POST['web'];
$fb = $_POST['fb'];
$insta = $_POST['insta'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$codepostal = $_POST['codepostal'];
$domaine = $_POST['domaine'];
$presentation = $_POST['pres'];
$description = $_POST['description'];
$photo_url = $_POST['photo_url'];
$itw_url = $_POST['itw_url'];

$sql = "UPDATE artiste SET prenom = ?, nom = ?, pseudo = ?, email = ?, telephone = ?, web = ?, facebook = ?, instagram = ?, adresse = ?, ville = ?, code_postal = ?, domaine = ?, presentation = ?, description = ?, photo_url = ?, interview_url = ?, genre_id = ? WHERE id = ?;";
$stmt = $db->prepare($sql);
$stmt->bindValue(1, $prenom);
$stmt->bindValue(2, $nom);
$stmt->bindValue(3, $pseudo);
$stmt->bindValue(4, $email);
$stmt->bindValue(5, $tel);
$stmt->bindValue(6, $web);
$stmt->bindValue(7, $fb);
$stmt->bindValue(8, $insta);
$stmt->bindValue(9, $adresse);
$stmt->bindValue(10, $ville);
$stmt->bindValue(11, $codepostal);
$stmt->bindValue(12, $domaine);
$stmt->bindValue(13, $presentation);
$stmt->bindValue(14, $description);
$stmt->bindValue(15, $photo_url);
$stmt->bindValue(16, $itw_url);
$stmt->bindValue(17, $genre);
$stmt->bindValue(18, $id);
$stmt->execute();

header("Location: ../../dashboard");
