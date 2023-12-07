<?php
include_once('../../../database/config/config.php');

function isEmailValid($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isPwdValid($pwd)
{
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>§~]).{8,}$/', $pwd);
}

$requiredFields = ['email', 'pwd'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        header("Location: ../login.php?error=empty_fields");
        exit();
    }
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../login.php?error=invalid_email");
    exit();
}

if (!isPwdValid($_POST['pwd'])) {
    header("Location: ../login.php?error=invalid_pwd");
    exit();
}

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM utilisateur WHERE email = :email";
$stmt = $db->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header("Location: ../login.php?error=invalid_email");
    exit();
}

if (!password_verify($pwd, $user['mdp'])) {
    header("Location: ../login.php?error=wrong_pwd");
    exit();
}

// connect the user
session_start();
$_SESSION['user'] = $db->lastInsertId();

// get user info
$sql = "SELECT * FROM utilisateur WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $_SESSION['user']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$_SESSION['firstname'] = $user['prenom'];
$_SESSION['lastname'] = $user['nom'];

header("Location: ../../map?user_id=" . $_SESSION['user']);
exit();
