<?php
require_once 'templates/header.php';
require_once 'classes/class_users.php';
require_once 'lib/function.php';

$errors = [];
$successes = [];

if (isset($_SESSION['errors'])) {
  foreach ($_SESSION['errors'] as $error) {
    $errors[] = $error;
  }
}
if (isset($_SESSION['successes'])) {
  foreach ($_SESSION['successes'] as $success) {
    $successes[] = $success;
  }
}
?>

<section class="container py-5">
  <?php
  foreach ($errors as $error) { ?>
    <div class="my-1 alert alert-danger" role="alert">
      <?= $error; ?>
    </div>
  <?php }

  foreach ($successes as $success) { ?>
    <div class="my-0 alert alert-success" role="alert">
      <?= $success; ?>
    </div>
  <?php } ?>

  <div class="row pt-0 pb-5 d-flex">
  <div class="form-signin m-auto col-lg-6">
      <h1 class="mb-3 mx-auto text-center fw-normal">Connexion</h1>

      <form action="lib/connect.php" method="POST" class="m-auto text-center">
        <!-- <img class="mb-4 mx-auto w-50" src="assets/images/logo-cuisinea-horizontal.jpg" alt="logo Cuisinéa"> -->
        <div class="form-floating m-2">
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
          <label for="email">E-mail</label>
        </div>
        <div class="form-floating m-2 position-relative">
          <input type="password" class="form-control" id="password" name="password" placeholder="votre mot de passe" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>">
          <div class="click hidden visible position-absolute end-0 top-50 translate-middle">
            <?php include_once 'assets/images/visible.svg'; ?>
          </div>
          <div class="click not-visible position-absolute end-0 top-50 translate-middle">
            <?php include_once 'assets/images/no-visible.svg'; ?>
          </div>
          <label for="password">Mot de passe</label>
        </div>

        <div class="form-check text-start m-2">
          <input class="form-check-input" type="checkbox" value="checked" id="remember" name="remember" <?= isset($_COOKIE['email']) ? 'checked' : ''; ?>>
          <label class="form-check-label" for="remember">
            Mémoriser
          </label>
        </div>
        <button class="btn btn-primary py-2" type="submit" name="connect">Se connecter</button>
      </form>
    </div>
  </div>
</section>


<?php require_once 'templates/footer.php'; ?>