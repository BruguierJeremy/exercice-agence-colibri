<h2 class="login-h2"> ---Connexion---</h2>

<?php if (isset($errorList)) :?>
  <?php foreach( $errorList as $currentError): ?>

    <div class="alert" role="alert">
      <?= $currentError; ?>
    </div>

  <?php endforeach; ?>
<?php endif; ?>

<form class="login-form" action="" method="POST">  
  <!-- Email input -->
  <div class="form-login">
    <label class="form-label" for="form1">Email</label>
    <input type="" id="form1" name="email" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-login">
    <label class="form-label" for="form2">Mot de passe</label>
    <input type="password" id="form2"  name="password" class="form-control" />
  </div>

  <!-- Submit button -->
  <div class="form">
  <button type="submit" class="btn-validate-login">Se connecter</button>
  </div>
</form>