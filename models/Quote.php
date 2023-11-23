<?php
function insertQuote($db)
{
    try { 
    // On insère le nouveau devis dans la base de données après vérifications
    $stmt = $db->prepare('INSERT INTO quote (lastname, firstname, mail_address, email_address, phone_number, surface, society, work_type, work_description, submission_date)
    VALUES
    (:lastname, :firstname, :mail_address, :email_address, :phone_number, :surface, :society, :work_type, :work_description, :submission_date)');
    $stmt->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);
    $stmt->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
    $stmt->bindParam(':mail_address', $_POST['mail_address'], PDO::PARAM_STR);
    $stmt->bindParam(':email_address', $_POST['email_address'], PDO::PARAM_STR);
    $stmt->bindParam(':phone_number', $_POST['phone_number'], PDO::PARAM_STR);
    $stmt->bindParam(':surface', $_POST['surface'], PDO::PARAM_STR);
    $stmt->bindParam(':society', $_POST['society'], PDO::PARAM_STR);
    $stmt->bindParam(':work_type', $_POST['work_type'], PDO::PARAM_STR);
    $stmt->bindParam(':work_description', $_POST['work_description'], PDO::PARAM_STR);
    $currentDate = date("Y-m-d H:i:s");
    $stmt->bindParam(':submission_date', $currentDate, PDO::PARAM_STR);

    $addQuote = $stmt->execute();
    if ($addQuote) {
        echo "Le devis a été ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du devis.";
        print_r($stmt->errorInfo()); // Affichez les informations sur l'erreur SQL
    }

} catch (PDOException $e) {
    echo "Erreur PDO : " . $e->getMessage();
}
}

?>

<?php

function getQuote($db, $quote_id)
{
    $stmt = $db->prepare('SELECT * FROM quote WHERE quote_id = :quote_id');
    $stmt->bindParam(':quote_id', $quote_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateQuote($db, $quote_id)
{
    // Mise à jour des champs du devis selon les besoins
    $stmt = $db->prepare('UPDATE quote SET ... WHERE quote_id = :quote_id');
    $stmt->bindParam(':quote_id', $quote_id, PDO::PARAM_INT);
    // Ajout des autres bindParam pour les champs à mettre à jour
    // ...
    return $stmt->execute();
}

function deleteQuote($db, $quote_id)
{
    $stmt = $db->prepare('DELETE FROM quote WHERE quote_id = :quote_id');
    $stmt->bindParam(':quote_id', $quote_id, PDO::PARAM_INT);
    return $stmt->execute();
}

function getAllQuotes($db) {
    $query = "SELECT * FROM quotes"; // Assurez-vous que 'quotes' est le nom de votre table

    $result = mysqli_query($db, $query);

    if (!$result) {
        die("Erreur lors de la récupération des devis: " . mysqli_error($db));
    }

    $quotes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    return $quotes;
}
?>
