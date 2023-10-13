<?php include_once 'templates/head.php'; ?>

<section  class=" bg-warning bg-gradient">

    <div class="devis">


      <div class="container">

        <h2 class="display-3 fw-bold">Demande de devis</h2>

        <div class="mb-3">
          <form action="../controllers/controller_quote_form.php" method="POST">

            <div class="row">
              <div class="col">
                <input type="text" name="lastname" class="form-control" placeholder="nom" aria-label="lastname">
              </div><br>
              <div class="col">
                <input type="text" name="firstname" class="form-control" placeholder="firstname"
                  aria-label="firstnamename">
              </div>
            </div>

            <div class="row">
              <div class="col">
                <input type="text" name="society" class="form-control" placeholder="Société" aria-label="Société">
              </div>

              <div class="col">
                <input type="text" name="phone_number" class="form-control" placeholder="Telephone" aria-label="Tel">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" name="mail_address" class="form-control" placeholder="Adressse" aria-label="Address">
              </div>

              <div class="col">
                <input type="text" name="surface" class="form-control" placeholder="Surface du bien"
                  aria-label="Surface">
              </div>
            </div>


            <div class="row">
              <label for="exampleFormControlTextarea1" class="form-label">Mail</label>
              <input type="text" name="email_address" class="form-control" placeholder="email" aria-label="email">


              <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
              <textarea name="work_description" class="form-control" id="exampleFormControlTextarea1"
                rows="3"></textarea>
            </div>
        </div>
        <div class="d-flex justify-content-center py-3">
          <input type="hidden" name="action" value="submit_quote">
          <button type="submit" class="button">Confirmer la demande</button>
          <!-- <a href="controllers/controller-quote.php" type="submit" class="bouton">Confirm identity</a> -->
        </div>
        </form>

      </div>

    </div>
  </section>



  <?php include_once 'templates/footer.php'; ?>