<?php
require_once 'templates/header.php';
require_once 'lib/function.php';
require_once 'classes/class_reciepe.php';
?>

<section class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5">
    <div class="col-10 mx-auto col-sm-8 col-lg-6">
      <img src="assets/images/logo-cuisinea.jpg" class="d-block mx-lg-auto img-fluid" alt="logo Cuisinea" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3">Cuisinea - Recettes de cuisine</h1>
      <p class="lead">
      Bienvenue sur Cuisinéa, où les recettes prennent vie grâce à notre communauté passionnée. 
      Découvrez des entrées, plats et desserts simples et délicieux, créés avec amour par nos membres. 
      Rejoignez-nous pour partager vos propres créations et explorer un monde de saveurs authentiques.
      </p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
        <a href="toutes-les-recettes" class="btn btn-primary btn-lg px-4 me-md-2">Voir nos recettes</a>
      </div>
    </div>
  </div>
</section>

<section class="container col-xxl-8 px-4">
  <div class="row flex-lg-row align-items-center g-5 py-5">
    <h2>Les dernières recettes</h2>

    <?php
    $reciepies = getAllReciepes($pdo, 3);
    foreach ($reciepies as $reciepe) {

      $category = getCategoryById($pdo, $reciepe['category_id']);
      

      $current = new Reciepe (
        $reciepe['id'], 
        $reciepe['title'], 
        $reciepe['description'], 
        $reciepe['ingredients'], 
        $reciepe['instructions'], 
        $category['name'],
        $reciepe['image']);
      $current->view_list();
    }


    ?>
  </div>
</section>

<?php
require_once 'templates/footer.php';
?>