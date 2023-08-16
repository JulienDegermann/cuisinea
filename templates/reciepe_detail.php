<section class="container col-xxl-8 px-4 py-5">
  <div class="row flex-lg-row-reverse align-items-center g-5 py-0">
    <div class="col-10 col-sm-8 col-lg-6">
      <img src="<?= $this->image; ?>" class="card-img-top" alt="<?= $this->title; ?>">
    </div>
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold lh-1 mb-3"><?= $this->title; ?></h1>
      <p class="lead"><?= $this->description; ?></p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start">
      </div>
    </div>
  </div>
</section>
<section class="container col-xxl-8 px-4 py-2">
  <h2>Liste des ingrédients</h2>
  <div class="row flex-lg-row-reverse align-items-center g-5">
    <ul class="list-group px-2">
      <?php
      $ingredients = stringToArray($this->ingredients);
      foreach ($ingredients as $ingredient) { ?>
        <li class="list-group-item"><?= $ingredient; ?> </li>
      <?php } ?>
    </ul>
  </div>
</section>

<section class="container col-xxl-8 px-4 py-2">
  <h2>Préparation</h2>
  <div class="row flex-lg-row-reverse align-items-center g-5">
    <ol class="list-group list-group-numbered px-2">
      <?php
      $instructions = stringToArray($this->instructions);
      foreach ($instructions as $instruction) { ?>
        <li class="list-group-item"><?= $instruction; ?> </li>
      <?php } ?>
    </ol>
  </div>
</section>