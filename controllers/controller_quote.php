<?php
require "../models/Quote.php";
require "../helpers/Database.php";
require "../views/quote_form.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $mail_address = $_POST['mail_address'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $surface = $_POST['surface'];
    $society = $_POST['society'];
    $work_type = $_POST['work_type'];
    $work_description = $_POST['work_description'];
    $addQuote = insertQuote($db);
    
    if($addQuote){
        // Redirection après la soumission du formulaire
        header('Location: ../confirmation.php');
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
            header('Location: ../confirmation.php');
            exit();
        } else {
            echo "Erreur lors de la suppression du devis.";
        }
    }
}
?>
