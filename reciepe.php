<?php
require_once 'templates/header.php';
require_once 'classes/class_reciepe.php';
?>


<section class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row align-items-center g-5 py-5">
    <h2>Toutes nos recettes</h2>
    <?php
    $recipe_id = $_GET['id'];
    echo $id;
    ?>
  </div>
</section>

<?php require_once 'templates/footer.php'; ?>