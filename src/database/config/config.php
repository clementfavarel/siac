<?php

// Informations de connexion à la base de données
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'clement');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'siac');

// Connexion à la base de données
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE . ';charset=utf8', DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
