<?php if (isset($errorList)) :?>
  <?php foreach( $errorList as $currentError): ?>

    <div class="alert alert-danger" role="alert">
      <?= $currentError; ?>
    </div>

  <?php endforeach; ?>
<?php endif; ?>
  
<h1 class="login-h1"> ---Connexion---</h1>

<form class="login-form" action="" method="POST">  
  <!-- Email input -->
  <div class="form-login">
    <label class="form-label" for="form1Example1">Email</label>
    <input type="" id="form1Example1" name="email" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-login">
    <label class="form-label" for="form1Example2">Mot de passe</label>
    <input type="password" id="form1Example2"  name="password" class="form-control" />
  </div>

  <!-- Submit button -->
  <div class="form">
  <button type="submit" class="btn-validate-login">Se connecter</button>
  </div>
</form>