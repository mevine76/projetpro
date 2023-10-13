<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sbtr";

try {
    $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
