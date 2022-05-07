<h2>Ajouter un utilisateur</h2>

<?php if (isset($errorList)) :?>
  <?php foreach( $errorList as $currentError): ?>
    <div class="alert" role="alert">
      <?= $currentError; ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<form action="" method="POST" class="mt-5">
    <div class="form-group">
        <label for="email">Adresse email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="" value="">
    </div>
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="" value="">
    </div>
    <div class="form-group">
        <label for="name">Prénom</label>
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="" value="">
    </div>
    <div class="form-group">
        <label for="subject">Sujet</label>
        <input type="text" class="form-control" name="subject" id="subject" placeholder="" value="">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea type="textarea" class="form-control" name="message" id="message" placeholder="" value=""></textarea>
    </div>
    <button type="submit" class="btn-validate">Valider</button>
</form>