<?php
require_once 'templates/header.php';
require_once 'classes/class_reciepe.php';
?>


<section class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row align-items-center g-5 py-5">
    <h2>Toutes nos recettes</h2>
    <?php
    $reciepies = getAllReciepes($pdo);
    foreach ($reciepies as $reciepe) {

      $current = new Reciepe($reciepe['id'], $reciepe['title'], $reciepe['ingredients'], $reciepe['instructions'], $reciepe['image']);
      $current->view_list();
    }
    ?>
  </div>
</section>

<?php require_once 'templates/footer.php'; ?>