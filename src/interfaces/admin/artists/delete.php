<?php
include_once('../../../database/config/config.php');
$sql = "DELETE FROM artiste WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
header('Location: ./index.php');
