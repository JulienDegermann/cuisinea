<?php
require_once 'templates/header.php';
require_once 'classes/class_users.php';
require_once 'lib/function.php';


$errors = [];
$successes = [];




//get inputs values if error not to complete all
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $last_name = $_POST['last_name'];
  $first_name = $_POST['first_name'];
  // check if user exists
  if (!$email || !$password || !$last_name || !$first_name) {
    $errors[] = 'Un champ est manquant.';
  }
  $result = getUserByEmail($pdo, $email);
  if (!$result) {
    $successes[] = 'tout est bon pour ne nouveau compte';
  } else {
    $errors[] = 'Vous avez déjà un compte';
  }
  if (!$errors) {
    $res = newUser($pdo, $first_name, $last_name, $email, $password);
    if ($res) {
      $successes[] = 'compte créé avec succès';
    }
  }
}
?>

<div class="container py-5">
  <div class="row py-5 d-flex">
    <div class="form-signin m-auto col-lg-6">
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
      <h1 class="mb-3 mx-auto text-center fw-normal">Inscription</h1>
      <form method="POST" class="m-auto text-center px-0">
        <!-- <img class="mb-4 mx-auto w-50" src="assets/images/logo-cuisinea-horizontal.jpg" alt="logo Cuisinéa"> -->

        <div class="form-floating my-2">
          <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Votre prénom">
          <label for="first_name">Prénom</label>
        </div>
        <div class="form-floating my-2">
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="votre nom">
          <label for="last_name">Nom</label>
        </div>
        <div class="form-floating my-2">
          <input type="email" class="form-control" id="email" name="email" placeholder="votre email">
          <label for="email">E-mail</label>
        </div>
        <div class="form-floating my-2 position-relative">
          <input type="password" class="form-control" id="password" name="password" placeholder="votre mot de passe">

          <div class="click hidden visible position-absolute end-0 top-50 translate-middle">
            <?php include_once 'assets/images/visible.svg'; ?>
          </div>
          <div class="click not-visible position-absolute end-0 top-50 translate-middle">
            <?php include_once 'assets/images/no-visible.svg'; ?>
          </div>
          <label for="password">Mot de passe</label>
        </div>


        <!-- <div class="form-check text-start my-3">
          <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Remember me
          </label>
        </div> -->
        <button class="btn btn-primary m-auto py-2" type="submit">S'inscrire</button>
      </form>
    </div>
  </div>
</div>


<?php require_once 'templates/footer.php'; ?>