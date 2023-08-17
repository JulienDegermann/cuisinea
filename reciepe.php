<?php
require_once 'templates/header.php';
require_once 'classes/class_reciepe.php';
require_once 'lib/function.php';
?>


<section class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row align-items-center g-5">
    <?php
    $id = intval($_GET['id']);
    $reciepe = getReciepeById($pdo, $id);
    if ($reciepe) {
      $current = new Reciepe($reciepe[0]['id'], $reciepe[0]['title'], $reciepe[0]['description'], $reciepe[0]['ingredients'], $reciepe[0]['instructions'], $reciepe[0]['image']);
      $current->view_detail();
    } else { ?>
      <h1 class="text-center">OOPS Recette introuvable !</h1>
    <?php } ?>
  </div>
</section>

<?php require_once 'templates/footer.php'; ?>