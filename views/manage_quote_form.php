<?php include_once 'templates/head.php'; ?>

<body class="container py-5">

    <h1 class="mb-4">Gestion des Devis</h1>

    <form action="../controllers/controller_manage_quote_form.php" method="POST">

        <div class="mb-3">
            <label for="quote_id" class="form-label">ID du Devis</label>
            <input type="text" class="form-control" id="quote_id" name="quote_id">
        </div>

        <div class="mb-3">
            <label for="action" class="form-label">Action</label>
            <select class="form-select" id="action" name="action" required>
                <option value="" selected disabled>Choisissez une action</option>
                <option value="get">Obtenir Devis</option>
                <option value="update">Mettre à Jour Devis</option>
                <option value="delete">Supprimer Devis</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Soumettre</button>

    </form>

  

</body>

</html>
<?php include_once 'templates/footer.php'; ?>
