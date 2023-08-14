<?php
require_once 'templates/header.php';
require_once 'lib/function.php';
require_once 'classes/class_reciepe.php';
?>

<section class="container col-xxl-8 px-4">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="assets/images/logo-cuisinea.jpg" class="d-block mx-lg-auto img-fluid" alt="logo Cuisinea" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3">Cuisinea - Recettes de cuisine</h1>
      <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis optio alias dignissimos, cum saepe quidem necessitatibus dicta placeat qui commodi ullam laudantium! Eius ipsa enim suscipit recusandae necessitatibus explicabo nisi.</p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="reciepes.php" class="btn btn-primary btn-lg px-4 me-md-2">Voir nos recettes</a>
      </div>
    </div>
  </div>
</section>

<section class="container col-xxl-8 px-4">
  <div class="row flex-lg-row align-items-center g-5 py-5">
    <h2>Nos dernières recettes</h2>

    <?php
    $reciepies = getAllReciepes($pdo, 3);
    foreach ($reciepies as $reciepe) {
      $current = new Reciepe ($reciepe['id'], $reciepe['title'], $reciepe['description'], $reciepe['ingredients'], $reciepe['instructions'], $reciepe['category_id'], $reciepe['image']);
      $current->view_list();
    }
    ?>
  </div>
</section>

<?php
require_once 'templates/footer.php';
?>