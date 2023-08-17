<?php
session_start();
require_once 'lib/config.php';
require_once 'lib/pdo.php';

if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/override-bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" type="image/x-icon" href="assets/images/cuisinea_favicon.png">

  <title>Cuisinéa - <?= $pages[$current_page]; ?></title>
</head>

<body>

  <!-- FIX DISPLAY MOBILE -->
  <header class="navbar navbar-expand-lg">
    <div class="container">
      <div class="position-relative flex-wrap d-flex align-items-center justify-content-between py-3 border-bottom w-100">
        <!-- flex-wrap   w-100  -->
        <div class="col-12 col-lg-3 md-2 mb-md-0">
          <a href="index.php" class="
              d-inline-block 
              w-auto
              navbar-brand
              link-body-emphasis 
              text-decoration-none">
            <img src="assets/images/logo-cuisinea-horizontal.jpg" alt="logo Cuisinea" class="w-100">
          </a>
        </div>
        <!-- <div class="collapse navbar-collapse col-12 col-md-auto text-center " id="navbarNavAltMarkup"> -->
        <!-- <nav> -->
        <!-- <nav class="nav mb-2 justify-content-center col-12 mb-md-0"> -->

        <!-- </div> -->
        <!-- </nav> -->
        <nav class="collapse navbar-collapse nav mb-2 justify-content-center col-12 col-md-auto mb-md-0" id="navbarNavAltMarkup">
          <?php require 'templates/partial_nav.php'; ?>
        </nav>
        <div class=" col-3 col-md-auto d-inline-flex text-end">
          <?php
          if (!isset($_SESSION['user'])) { ?>
            <a href="sign_in.php" class="btn btn-outline-primary me-1">Inscription</a>
            <a href="login.php" class="btn btn-primary">Connexion</a>
          <?php } else { ?>
            <a href="logout.php" class="btn btn-outline-primary me-1">Déconnexion</a>
          <?php } ?>
        </div>
        <button class="navbar-toggler col-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
  <main class="position-relative">
    <div class="container text-secondary w-100 m-auto position-absolute top-0 start-50 translate-middle-x text-end">
      <?php if (isset($_SESSION['user'])) { ?>
        <p class="">Bonjour <?= $_SESSION['user']['first_name']; ?></p>
      <?php } ?>
    </div>