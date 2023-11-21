<?php
session_start();
// Vérifier si l'administrateur est connecté
if (!isset($_SESSION['admin_id'])) {
    header('Location: controller_home.php'); // Rediriger vers le formulaire de connexion
    exit();
}
include_once '../models/Upload.php';
require_once '../views/upload_form.php';
require "../helpers/Database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload']) && $_POST['upload'] === 'upload') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['image']['name'];
        $tempPath = $_FILES['image']['tmp_name'];
        $category = $_POST['category'];

        $uploadDirectory = '../assets/img/';
        $targetPath = $uploadDirectory . $filename;

        if (move_uploaded_file($tempPath, $targetPath)) {
            $inserted = insertImage($filename, $category);
            

            if ($inserted) {
                echo "L'image a été téléchargée avec succès et ajoutée à la base de données.";
            } else {
                echo "Erreur lors de l'ajout de l'image à la base de données.";
            }
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
    } else {
        echo "Aucun fichier n'a été téléchargé.";
    }
}
