<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../models/Quote.php";
require "../helpers/Database.php";
var_dump($db);

require "../views/quote_form.php";
require "../views/confirmation.php";
require "../helpers/Form.php";
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $lastname = Form::safeData($_POST['lastname']);
    $firstname = Form::safeData($_POST['firstname']);
    $mail_address = Form::safeData($_POST['mail_address']);
    $email_address = Form::safeData($_POST['email_address']);
    $phone_number = Form::safeData($_POST['phone_number']);
    $surface = Form::safeData($_POST['surface']);
    $society = Form::safeData($_POST['society']);
    $work_type = Form::safeData($_POST['work_type']);
    $work_description = Form::safeData($_POST['work_description']);
    $addQuote = insertQuote($db);
    var_dump($addQuote);
    
    if($addQuote){
        // Redirection après la soumission du formulaire
        header('Location: ../views/confirmation.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout du devis.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['quote_id'])) {
    // Si un ID de devis est passé en paramètre dans l'URL
    $quote_id = $_GET['quote_id'];

    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        // Afficher le formulaire de modification
        $quote = getQuote($db, $quote_id);
        include "../views/edit_quote_form.php";
    } elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
        // Mettre à jour le devis
        $updateQuote = updateQuote($db, $quote_id);
        if ($updateQuote) {
            header('Location: ../views/confirmation.php');
            exit();
        } else {
            echo "Erreur lors de la mise à jour du devis.";
        }
    } elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {
        // Supprimer le devis
        $deleteQuote = deleteQuote($db, $quote_id);
        if ($deleteQuote) {
            header('Location: ../views/confirmation.php');
            exit();
        } else {
            echo "Erreur lors de la suppression du devis.";
        }
    }
}
?>
