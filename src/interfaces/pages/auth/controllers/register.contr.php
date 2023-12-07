<?php

function isEmailValid($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isPwdValid($pwd)
{
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>§~]).{8,}$/', $pwd);
}

function createDate($day, $month, $year)
{
    return date('d-m-Y', strtotime($day . '-' . $month . '-' . $year));
}

function calculateAge($birthdate)
{
    $birthdateObj = DateTime::createFromFormat('d-m-Y', $birthdate);
    if (!$birthdateObj) {
        return false;
    }

    $currentDateObj = new DateTime();
    $ageInterval = $currentDateObj->diff($birthdateObj);
    $age = $ageInterval->y;

    return $age;
}

/**
 * REGISTERING USER
 */

$requiredFields = ['firstname', 'lastname', 'job', 'email', 'dd', 'mm', 'yyyy', 'pwd', 'pwd-repeat'];

foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        header("Location: ../register.php?error=empty_fields");
        exit();
    }
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalid_email");
    exit();
}

if (strlen($_POST['firstname']) > 50 || strlen($_POST['lastname']) > 50 || strlen($_POST['job']) > 50) {
    header("Location: ../register.php?error=input_too_long");
    exit();
}

$day = $_POST['dd'];
$month = $_POST['mm'];
$year = $_POST['yyyy'];

if (!checkdate($month, $day, $year)) {
    header("Location: ../register.php?error=invalid_date");
    exit();
}

$date = createDate($day, $month, $year);
$age = calculateAge($date);

switch ($age) {
    case ($age > 0 && $age < 16):
        $ageGroup = '-16';
        break;
    case ($age >= 16 && $age < 25):
        $ageGroup = '16-24';
        break;
    case ($age >= 25 && $age < 35):
        $ageGroup = '25-34';
        break;
    case ($age >= 35 && $age < 45):
        $ageGroup = '35-44';
        break;
    case ($age > 45 && $age < 65):
        $ageGroup = '45-64';
        break;
    case ($age >= 65):
        $ageGroup = '65+';
        break;
    default:
        break;
}

if (!isPwdValid($_POST['pwd'])) {
    header("Location: ../register.php?error=invalid_pwd");
    exit();
}

if ($_POST['pwd'] !== $_POST['pwd-repeat']) {
    header("Location: ../register.php?error=pwd_mismatch");
    exit();
}

$hashedPwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

include_once('../../../../database/config/config.php');

$nom = $_POST['firstname'];
$prenom = $_POST['lastname'];
$email = $_POST['email'];
$mdp = $hashedPwd;
$tranche_age = $ageGroup;
$metier = $_POST['job'];

$sql = "INSERT INTO utilisateur (nom, prenom, email, mdp, tranche_age, metier) VALUES (?, ?, ?, ?, ?, ?);";
$stmt = $db->prepare($sql);
$stmt->bindValue(1, $nom);
$stmt->bindValue(2, $prenom);
$stmt->bindValue(3, $email);
$stmt->bindValue(4, $mdp);
$stmt->bindValue(5, $tranche_age);
$stmt->bindValue(6, $metier);
$stmt->execute();

// connect the user
session_start();
$_SESSION['user'] = $db->lastInsertId();
$_SESSION['firstname'] = $prenom;
$_SESSION['lastname'] = $nom;

header("Location: ../../map?user_id=" . $_SESSION['user']);
exit();
