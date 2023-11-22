<?php
session_start();
require "../models/Quote.php";
require "../helpers/Database.php";
require "../views/manage_quote_form.php";
require "../views/confirmation.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    
    if ($action == 'get') {
        // Obtenir le devis
        $quote_id = $_POST['quote_id'];
        $quote = getQuote($db, $quote_id);
        // Afficher les détails du devis
        // ...
    } elseif ($action == 'update') {
        // Mettre à jour le devis
        $quote_id = $_POST['quote_id'];
        $updateQuote = updateQuote($db, $quote_id);
        if ($updateQuote) {
            header('Location: ../views/confirmation.php');
            exit();
        } else {
            echo "Erreur lors de la mise à jour du devis.";
        }
    } elseif ($action == 'delete') {
        // Supprimer le devis
        $quote_id = $_POST['quote_id'];
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
